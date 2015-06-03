<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Reset password</h3>
    </div>
    <form class="form"
          action="{{ action('\jakubsacha\adminlte\Http\Controllers\AccountsController@anyEditPassword', [$oUser->id]) }}">
        <div class="box-body">
            @if (!empty($success))
                <p class="alert alert-success">Changes has been saved.</p>
            @endif

            <div class="form-group">
                <label for="inputEmail3" class="control-label">New password</label>
                @if ($errors->has('password'))
                    <p class="text-red">{{ $errors->first('password') }}</p>
                @endif
                <input type="password" name="password" class="form-control" id="password" placeholder="New password">
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="control-label">Repeat</label>
                @if ($errors->has('password_confirmation'))
                    <p class="text-red">{{ $errors->first('password_confirmation') }}</p>
                @endif
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                       placeholder="Repeat">
            </div>
        </div>
        <div class="box-footer">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button type="submit" class="btn btn-warning pull-right">Save</button>
        </div>
    </form>
</div>