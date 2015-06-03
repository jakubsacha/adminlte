<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Account</h3>
    </div>

    <form class="form"
          action="{{ action('\jakubsacha\adminlte\Http\Controllers\AccountsController@anyEditAccount', [$oUser->id]) }}">
        <div class="box-body">
            @if (!empty($success))
                <p class="alert alert-success">Changes has been saved.</p>
            @endif

            <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                <label for="inputEmail3" class="control-label ">Name </label>
                @if ($errors->has('name'))
                    <p class="text-red">{{ $errors->first('name') }}</p>
                @endif
                <input type="text" class="form-control" id="name" name="name" value="{{ $oUser->name }}"
                       placeholder="Name">
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="control-label">Email</label>
                @if ($errors->has('email'))
                    <p class="text-red">{{ $errors->first('email') }}</p>
                @endif
                <input type="email" class="form-control" id="email" name="email" value="{{ $oUser->email }}"
                       placeholder="Email">
            </div>
        </div>
        <div class="box-footer">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button type="submit" class="btn btn-info pull-right">Save</button>
        </div>
    </form>
</div>
