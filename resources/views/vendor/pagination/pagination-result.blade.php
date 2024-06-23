@if($paginator->total() > 0)
    <div class="result-count margin-top-auto margin-bottom-auto" style="font-size: 1.8rem;">
        Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
    </div>
@endif