<section class="filter content mb-3">
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-12">
                <a data-toggle="collapse" href="#filters-form" class="text-decoration-none">
                    <i class="fas fa-filter align-middle"></i> Фильтры
                </a>
            </div>
        </div>
    </div>
    <form action="{{ route('admin.user.index') }}" method="POST" class="collapse" id="filters-form">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-md-2 mb-2">
                    <label for="banned">Показать пользователей</label>
                    <select class="form-control-sm form-control bg-white w-100" name="banned"
                            data-live-search="true" id="banned">
                        <option value="" {{ !isset($query['banned']) ? ' selected' : '' }}>Всех</option>
                        <option value="true" {{ (isset($query['banned']) && $query['banned'] === "true") ? ' selected' : '' }}>Заблокированных</option>
                        <option value="false" {{ (isset($query['banned']) && $query['banned'] === "false") ? ' selected' : '' }}>Не заблокированных</option>
                    </select>
                </div>
            </div>
            <div class="row text-right">
                <div class="col-12">
                    <button type="submit" class="btn btn-sm">
                        <i class="fas fa-search"></i> Искать
                    </button>
                </div>
            </div>
        </div>
    </form>
</section>
