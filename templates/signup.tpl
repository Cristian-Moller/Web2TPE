{include 'templates/header.tpl'}    
    <form action="GuardarUsuario" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        
        <input type="submit" value="GuardarUsuario">
    </form>
{include 'templates/footer.tpl'}
