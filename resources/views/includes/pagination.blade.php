<div class="pull-left d-none d-sm-block">
	<span class="pagination-detail">
		Showing {{ number_format($items->firstItem()) }} to {{ number_format($items->lastItem()) }} of {{ number_format($items->total()) }} rows
	</span>
</div>
<div class="pull-right d-none d-lg-block">
	{{ $items->links('pagination::bootstrap-4') }}
</div>
<div class="pull-right d-block d-lg-none">
	{{ $items->links('pagination::simple-bootstrap-4') }}
</div>