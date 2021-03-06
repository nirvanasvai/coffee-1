<div class="shadow card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-6">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Назад</a>
            </div>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary float-right">Сохранить</button>
            </div>
        </div>

    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
                   aria-controls="general" aria-selected="true"><i class="fas fa-home"></i> Основные</a>
            </li>
        </ul>
    </div>
    <div class="card-body">

        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                <div class="form-group">
                    <label for="">Имя</label>
                    <input type="text" class="form-control" name="name" placeholder="Имя"
                           value="@if(old('name')){{old('name')}}@else{{$user->name ?? ""}}@endif" required>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email"
                           value="@if(old('email')){{old('email')}}@else{{$user->email ?? ""}}@endif" required>
                </div>

                <div class="form-group">
                    <label for="">Пароль</label>
                    <input type="password" class="form-control" name="password">
                </div>


                <div class="form-group">
                    <label for="">Подтверждение</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="">Роль</label>
                    @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <select class="form-control @error('role') is-invalid @enderror" name="role" id="">
                        @if (isset($user))
                            @if ($user->role ==1)
                                <option value="1">Администратор</option>
                            @else
                                <option value="2">Пользователь</option>
                            @endif
                        @else
                            <option></option>
                            <option value="1">Администратор</option>
                            <option value="2">Пользователь</option>
                        @endif

                    </select>
                </div>
            </div>

        </div>
    </div>
</div>
