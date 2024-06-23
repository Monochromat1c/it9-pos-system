<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\PaymentMethod;
use App\Models\PaymentTransaction;
use App\Models\ProductTransaction;
use App\Models\UserModel;
use App\Models\GenderModel;
use App\Models\RoleModel;
use App\Models\Supplier;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class UserController extends Controller
{
    public function login()
    {
        return view('loginPage');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role_id == 1) {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/user/dashboard');
            }
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->withInput($request->except('password'));
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


    //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // ADMIN PAGE
    //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // Dashboard
    public function adminDashboard()
    {
        $user = Auth::user();
        return view('posAdminDashboard.dashboard', compact('user'));
    }

    // Go to profile
    public function showProfile()
    {
        $user = Auth::user();
        return view('posAdminDashboard.profile', compact('user'));
    }

    // Update Profile Picture
    public function updatePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->file('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }

            $filePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $filePath;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile picture updated successfully.');
    }

    // Update Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    // Products table
    public function adminProducts(Request $request)
    {
        $user = Auth::user();
        $query = Products::query();

        if ($request->has('q')) {
            $query->where('product_name', 'like', '%' . $request->input('q') . '%');
        }

        $products = $query->orderBy('product_name')->paginate(25);
        return view('posAdminDashboard.products', compact('products', 'user'));
    }


    // Redirect to product form
    public function createProduct()
    {
        $suppliers = Supplier::all();
        return view('posAdminDashboard.createProduct', compact('suppliers'));
    }

    // Add new product 
    public function storeProduct(StoreProductRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('product_image')) {
            $filePath = $request->file('product_image')->store('product_images', 'public');
            $validated['product_image'] = $filePath;
        }

        Products::create($validated);

        return redirect()->route('posAdminDashboard.products')->with('success', 'Product added successfully.');
    }

    // View specific product
    public function showProduct($id)
    {
        $product = Products::findOrFail($id);
        return view('posAdminDashboard.showProduct', compact('product'));
    }

    // Redirect to edit product page
    public function editProduct($id)
    {
        $product = Products::findOrFail($id);
        $suppliers = Supplier::all();
        return view('posAdminDashboard.editProduct', compact('product', 'suppliers'));
    }

    // Update product data
    public function updateProduct(UpdateProductRequest $request, $id)
    {
        $product = Products::findOrFail($id);
        $validated = $request->validated();

        if ($request->file('product_image')) {
            // Delete the old product image if exists
            if ($product->product_image && Storage::disk('public')->exists($product->product_image)) {
                Storage::disk('public')->delete($product->product_image);
            }

            // Store the new product image
            $filePath = $request->file('product_image')->store('product_images', 'public');
            $validated['product_image'] = $filePath;
        }

        $product->update($validated);

        return redirect()->route('posAdminDashboard.products')->with('success', 'Product updated successfully.');
    }

    // Delete the product
    public function destroyProduct($id)
    {
        $product = Products::findOrFail($id);

        if ($product->product_image && Storage::disk('public')->exists($product->product_image)) {
            Storage::disk('public')->delete($product->product_image);
        }

        $product->delete();

        return redirect()->route('posAdminDashboard.products')->with('success', 'Product deleted successfully.');
    }

    // User Record
    // public function adminRecords(Request $request)
    // {
    //     $user = Auth::user();
    //     $query = UserModel::with(['gender', 'role'])->whereNull('deleted_at');

    //     if ($request->has('q')) {
    //         $query->where(function($q) use ($request) {
    //             $q->where('first_name', 'like', '%' . $request->input('q') . '%')
    //             ->orWhere('last_name', 'like', '%' . $request->input('q') . '%')
    //             ->orWhere('middle_name', 'like', '%' . $request->input('q') . '%')
    //             ->orWhere('suffix_name', 'like', '%' . $request->input('q') . '%');
    //         });
    //     }

    //     $users = $query->orderBy('last_name')->paginate(25);
    //     return view('posAdminDashboard.records', compact('users', 'user'));
    // }

    // User Record
    public function adminUsersNew(Request $request)
    {
        $user = Auth::user();
        $query = UserModel::with(['gender', 'role'])->whereNull('deleted_at');

        if ($request->has('q')) {
            $query->where(function($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->input('q') . '%')
                ->orWhere('last_name', 'like', '%' . $request->input('q') . '%')
                ->orWhere('middle_name', 'like', '%' . $request->input('q') . '%')
                ->orWhere('suffix_name', 'like', '%' . $request->input('q') . '%');
            });
        }

        $users = $query->orderBy('last_name')->paginate(25);
        return view('posAdminDashboard.adminUsersNew', compact('users', 'user'));
    }


    // Get product record
    public function fetchAllProductsforAdmin()
    {
        $products = Products::with('supplier')->whereNull('deleted_at')->get();
        return response()->json($products);
    }

    // Redirect to user form
    public function createUser()
    {
        $genders = GenderModel::all();
        $roles = RoleModel::all();
        return view('posAdminDashboard.createUser', compact('genders', 'roles'));
    }

    // Add new user
    public function storeUser(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']); 

        if ($request->file('profile_picture')) {
            $filePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validated['profile_picture'] = $filePath;
        }

        UserModel::create($validated);

        return redirect()->route('admin-users')->with('success', 'User added successfully.');
    }

    // View specific user
    public function showUserforAdmin($id)
    {
        $user = UserModel::with(['gender', 'role'])->findOrFail($id);
        return view('posAdminDashboard.showUser', compact('user'));
    }

    // Redirect to edit user page
    public function editUser($id)
    {
        $user = UserModel::findOrFail($id);
        $genders = GenderModel::all();
        $roles = RoleModel::all();
        return view('posAdminDashboard.editUser', compact('user', 'genders', 'roles'));
    }

    // Update user data
    public function updateUser(UpdateUserRequest $request, $id)
    {
        $user = UserModel::findOrFail($id);
        $validated = $request->validated();

        if ($request->file('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }

            $filePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validated['profile_picture'] = $filePath;
        }

        $user->update($validated);

        return redirect()->route('admin-users')->with('success', 'User updated successfully.');
    }

    // Delete user
    public function destroyUser($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();
        return redirect()->route('admin-users')->with('success', 'User deleted successfully.');
    }

    // Get user record
    public function fetchAllUsersforAdmin()
    {
        $users = UserModel::with(['gender', 'role'])->whereNull('deleted_at')->get();
        return response()->json($users);
    }

    // For weekly in statistics
    private function getStartAndEndDate($yearWeek)
    {
        $year = substr($yearWeek, 0, 4);
        $week = substr($yearWeek, 4);

        $dto = new \DateTime();
        $dto->setISODate($year, $week);
        $ret['week_start'] = $dto->format('Y-m-d');
        $dto->modify('+6 days');
        $ret['week_end'] = $dto->format('Y-m-d');
        return $ret;
    }
    
    // Statistics
    public function adminStatistics()
    {
        $user = Auth::user();
        $dailyStatistics = PaymentTransaction::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total_amount) as total_sales')
        )
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->paginate(10, ['*'], 'daily');

        $weeklyStatistics = PaymentTransaction::select(
            DB::raw('YEARWEEK(created_at, 1) as week'),
            DB::raw('MIN(DATE(created_at)) as week_start'),
            DB::raw('MAX(DATE(created_at)) as week_end'),
            DB::raw('SUM(total_amount) as total_sales')
        )
        ->groupBy('week')
        ->orderBy('week', 'desc')
        ->paginate(10, ['*'], 'weekly');

        $monthlyStatistics = PaymentTransaction::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_amount) as total_sales')
        )
        ->groupBy('year', 'month')
        ->orderByRaw('year DESC, month DESC')
        ->paginate(10, ['*'], 'monthly');

        $yearlyStatistics = PaymentTransaction::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('SUM(total_amount) as total_sales')
        )
        ->groupBy('year')
        ->orderBy('year', 'desc')
        ->paginate(10, ['*'], 'yearly');

        return view('posAdminDashboard.statistics', compact(
            'dailyStatistics',
            'weeklyStatistics',
            'monthlyStatistics',
            'yearlyStatistics',
            'user'
        ));
    }

    
    // Get the transactions
    public function adminTransactions(Request $request)
    {
        $user = Auth::user();
        $query = PaymentTransaction::with(['user', 'paymentMethod', 'discount']);

        if ($request->has('q')) {
            $searchTerm = $request->input('q');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('transaction_id', 'like', '%' . $searchTerm . '%')
                ->orWhereHas('user', function ($q) use ($searchTerm) {
                    $q->where('first_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('last_name', 'like', '%' . $searchTerm . '%');
                })
                ->orWhereHas('paymentMethod', function ($q) use ($searchTerm) {
                    $q->where('payment_method', 'like', '%' . $searchTerm . '%');
                })
                ->orWhereHas('discount', function ($q) use ($searchTerm) {
                    $q->where('discount_name', 'like', '%' . $searchTerm . '%');
                });
            });
        }

        $transactions = $query->orderBy('created_at', 'desc')->paginate(25);
        return view('posAdminDashboard.transactions', compact('transactions', 'user'));
    }


    //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // USER PAGE
    //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // Dashboard
    public function userDashboard()
    {
        $user = Auth::user();
        return view('posUserDashboard.dashboard', compact('user'));
    }

    // Go to profile
    public function showProfileforUsers()
    {
        $user = Auth::user();
        return view('posUserDashboard.profile', compact('user'));
    }

    // Update Profile Picture
    public function updatePictureforUsers(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->file('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }

            $filePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $filePath;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile picture updated successfully.');
    }

    // Update Password
    public function updatePasswordforUsers(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    // Get product record
    public function fetchAllProductsforUsers()
    {
        $products = Products::with('supplier')->whereNull('deleted_at')->get();
        return response()->json($products);
    }

    // Products table
    public function userProducts(Request $request)
    {
        $query = Products::query();
        $user = Auth::user();

        if ($request->has('q')) {
            $query->where('product_name', 'like', '%' . $request->input('q') . '%');
        }

        $products = $query->orderBy('product_name')->paginate(25); 
        $cartItems = Cart::with('product')->get();
        $totalAmount = $cartItems->sum(function($item) {
            return $item->quantity * $item->price;
        });

        $cashiers = UserModel::whereIn('role_id', [2])->orderBy('first_name')->get();
        $paymentMethods = PaymentMethod::all();
        $discounts = Discount::orderBy('discount_name')->get();

        return view('posUserDashboard.products', compact('products', 'cartItems', 'totalAmount', 'cashiers', 'paymentMethods', 'discounts', 'user'));
    }

    // Get user record
    public function fetchAllUsersforUsers()
    {
        $users = UserModel::with(['gender', 'role'])->whereNull('deleted_at')->get();
        return response()->json($users);
    }

    // User Record
    public function userRecords(Request $request)
    {
        $user = Auth::user();
        $query = UserModel::with(['gender', 'role'])->whereNull('deleted_at');

        if ($request->has('q')) {
            $query->where(function($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->input('q') . '%')
                ->orWhere('last_name', 'like', '%' . $request->input('q') . '%')
                ->orWhere('middle_name', 'like', '%' . $request->input('q') . '%')
                ->orWhere('suffix_name', 'like', '%' . $request->input('q') . '%');
            });
        }

        $users = $query->orderBy('last_name')->paginate(25);
        return view('posUserDashboard.records', compact('users', 'user'));
    }

    // View specific user
    public function showUserforUsers($id)
    {
        $user = UserModel::with(['gender', 'role'])->findOrFail($id);
        return view('posUserDashboard.showUser', compact('user'));
    }

    // Add items to cart
    public function addToCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Products::find($product_id);

        if ($product && $product->quantity > 0) {
            $cartItem = Cart::where('product_id', $product_id)->first();

            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                Cart::create([
                    'product_id' => $product->id,
                    'quantity' => 1,
                    'price' => $product->price,
                ]);
            }

            $product->quantity -= 1;
            $product->save();
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // Decrement product quantity
    public function decreaseProduct($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $product = Products::find($cartItem->product_id);

            if ($product) {
                $product->quantity += 1;
                $product->save();
            }

            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
            } else {
                $cartItem->delete();
            }
        }

        return redirect()->back();
    }

    // Increment product quantity
    public function increaseProduct($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $product = Products::find($cartItem->product_id);

            if ($product) {
                $product->quantity -= 1;
                $product->save();
            }

            $cartItem->quantity += 1;
            $cartItem->save();
        }

        return redirect()->back();
    }

    // Remove SELECTED items from cart
    public function bulkRemoveFromCart(Request $request)
    {
        $cart_ids = $request->input('cart_ids', []); 

        foreach ($cart_ids as $cart_id) {
            $cartItem = Cart::find($cart_id); 

            if ($cartItem) {
                $product = Products::find($cartItem->product_id); 

                if ($product) {
                    $product->quantity += $cartItem->quantity;
                    $product->save(); 
                }

                $cartItem->delete(); 
            }
        }

        return redirect()->back()->with('success', 'Selected items removed from cart successfully!');
    }

    // Calculate the payable amount
    public function calculateTotalWithDiscount($total, $discountId)
    {
        $discount = Discount::find($discountId);

        if ($discount) {
            if ($discount->discount_amount == 20) {
                $discountAmount = ($total * 20) / 100;
            } else {
                $discountAmount = 0;
            }

            $total -= $discountAmount;
        }

        return $total;
    }

    // Go to the receipt page
    public function calculateReceipt(Request $request)
    {
        $request->validate([
            'cashier' => 'required',
            'payment_method' => 'required',
            'amount_paid' => 'required|numeric|min:0',
        ]);

        $cashier_id = $request->input('cashier');
        $payment_method_id = $request->input('payment_method');
        $discount_id = $request->input('discount');
        $amount_paid = $request->input('amount_paid');

        $cashier = UserModel::find($cashier_id);
        $payment_method = PaymentMethod::find($payment_method_id);
        $discount = Discount::find($discount_id);

        $cartItems = Cart::with('product')->get();
        $totalAmount = $cartItems->sum(function($item) {
            return $item->quantity * $item->price;
        });

        $totalAmountWithDiscount = $this->calculateTotalWithDiscount($totalAmount, $discount_id);

        $changeAmount = $amount_paid - $totalAmountWithDiscount;

        return view('posUserDashboard.receipt', compact('cartItems', 'cashier', 'payment_method', 'totalAmount', 'totalAmountWithDiscount', 'amount_paid', 'changeAmount', 'discount'));
    }

    // Print the receipt
    public function processReceipt(Request $request)
    {
        $validated = $request->validate([
            'cashier' => 'required|int',
            'payment_method' => 'required|int',
            'discount' => 'int|nullable',
            'total_amount' => 'required|numeric',
            'total_amount_with_discount' => 'required|numeric',
            'amount_paid' => 'required|numeric',
            'change_amount' => 'required|numeric',
        ]);

        $transaction = PaymentTransaction::create([
            'user_id' => $validated['cashier'],
            'payment_method_id' => $validated['payment_method'],
            'discount_id' => $validated['discount'],
            'total_amount' => $validated['total_amount'],
            'amount_paid' => $validated['amount_paid'],
            'change_amount' => $validated['change_amount'],
        ]);

        $cartItems = Cart::all();
        foreach ($cartItems as $item) {
            ProductTransaction::create([
                'transaction_id' => $transaction->transaction_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        Cart::truncate();

        return redirect()->route('posUserDashboard.products')->with('success', 'Transaction processed successfully.');
    }

    // Statistics
    public function userStatistics()
    {
        $user = Auth::user();
        $dailyStatistics = PaymentTransaction::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total_amount) as total_sales')
        )
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->paginate(10, ['*'], 'daily');

        $weeklyStatistics = PaymentTransaction::select(
            DB::raw('YEARWEEK(created_at, 1) as week'),
            DB::raw('MIN(DATE(created_at)) as week_start'),
            DB::raw('MAX(DATE(created_at)) as week_end'),
            DB::raw('SUM(total_amount) as total_sales')
        )
        ->groupBy('week')
        ->orderBy('week', 'desc')
        ->paginate(10, ['*'], 'weekly');

        $monthlyStatistics = PaymentTransaction::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_amount) as total_sales')
        )
        ->groupBy('year', 'month')
        ->orderByRaw('year DESC, month DESC')
        ->paginate(10, ['*'], 'monthly');

        $yearlyStatistics = PaymentTransaction::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('SUM(total_amount) as total_sales')
        )
        ->groupBy('year')
        ->orderBy('year', 'desc')
        ->paginate(10, ['*'], 'yearly');

        return view('posUserDashboard.statistics', compact(
            'dailyStatistics',
            'weeklyStatistics',
            'monthlyStatistics',
            'yearlyStatistics',
            'user'
        ));
    }

    // Get the transactions
    public function userTransactions(Request $request)
    {
        $user = Auth::user();
        $query = PaymentTransaction::with(['user', 'paymentMethod', 'discount']);

        if ($request->has('q')) {
            $searchTerm = $request->input('q');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('transaction_id', 'like', '%' . $searchTerm . '%')
                ->orWhereHas('user', function ($q) use ($searchTerm) {
                    $q->where('first_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('last_name', 'like', '%' . $searchTerm . '%');
                })
                ->orWhereHas('paymentMethod', function ($q) use ($searchTerm) {
                    $q->where('payment_method', 'like', '%' . $searchTerm . '%');
                })
                ->orWhereHas('discount', function ($q) use ($searchTerm) {
                    $q->where('discount_name', 'like', '%' . $searchTerm . '%');
                });
            });
        }

        $transactions = $query->orderBy('created_at', 'desc')->paginate(25);
        return view('posUserDashboard.transactions', compact('transactions', 'user'));
    }
}
