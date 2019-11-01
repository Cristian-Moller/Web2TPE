{include 'templates/header.tpl'}

    <form action="ingresar" method="post">
        <div class="form-group">
            <div class="form-group col-md-12">
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="username" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su email">
                    <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electronico.</small>
                </div>
            </div>
            <div class="form-group col-md-12">
                <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
            </div>
            
            {if $error}
            <div class="alert alert-danger" role="alert">
                {$error}
            </div>
            {/if}
        </div>
        <div class="btn col-md-12">
            <div class="btn col-md-4">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </div>
    </form>

{include 'templates/footer.tpl'}
