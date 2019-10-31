{include 'templates/header.tpl'}

    <form action="ingresar" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name="username" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su email">
            <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electronico.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        {if $error}
        <div class="alert alert-danger" role="alert">
            {$error}
        </div>
        {/if}

        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>

{include 'templates/footer.tpl'}
