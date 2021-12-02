@if ($paginator->hasPages())
<nav class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">

        @if ($paginator->onFirstPage())
        <li class="page-item">
            <a href="#" class="page-link" aria-label="Previous">
                <i class="ti-angle-left"></i>
            </a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">1</a>
        </li>
        <li class="page-item active">
            <a href="#" class="page-link">2</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link" aria-label="Next">
                <i class="ti-angle-right"></i>
            </a>
        </li>
    </ul>
</nav>
@endif
