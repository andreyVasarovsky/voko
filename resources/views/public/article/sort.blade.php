<section class="filter content mb-3">
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-12">
                <a data-toggle="collapse" href="#article-sorting-block" class="text-decoration-none">
                    <i class="fas fa-sort align-middle"></i> Сортировка
                </a>
            </div>
            <div class="col-12 collapse" id="article-sorting-block">
                <div class="row mt-2">
                    <div class="col-2">
                        <i class="fas fa-eye"></i> @sortablelink('view_qty', 'Просмотры')
                    </div>
                    <div class="col-2">
                        <i class="fas fa-comments"></i> @sortablelink('comments_count', 'Комментари')
                    </div>
                    <div class="col-2">
                        <i class="fas fa-heart text-danger"></i> @sortablelink('likes_count', 'Лайки')
                    </div>
                    <div class="col-2">
                        <i class="fas fa-times"></i> <a href="{{ request()->url() }}">Сбросить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
