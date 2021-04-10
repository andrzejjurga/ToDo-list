<?php
    include_once 'header.php';
?>
<style>

#forms{
    display: flex;
    flex-direction: column;
    padding-bottom: 80px;
}
#forms h2{
    justify-self: start;
}

#forms form{
    width: 100%;
    display: flex;
    flex-direction: column;
    align-self: center;
}

#forms form div{
    display: flex;
    flex: 1 0 auto;
    justify-content: space-around;
}

#forms form div input{
    width: 50%;
}

input, textarea{
    margin: 15px;
    height: 40px;
    font-size: 20px;
    border: 1px solid white;
}

textarea{
    height: 80px;
}

::placeholder{
    opacity: 1;
    font-size: 20px;
}
</style>

<div id=forms>
                <h2>Kontakt:</h2>
                <form>
                    <input type="text" name="name" placeholder="Imię">
                    <input type="text" name="surname" placeholder="Nazwisko">
                    <input type="text" name="email" placeholder="E-mail">
                    <textarea rows="5" placeholder="treść wiadomości"></textarea>
                    <div>
                        <input type="reset" value="Wyczyść">
                        <input type="submit" value="Wyślij">
                    </div>
                </form>
</div>


<?php
   include_once 'footer.php';
?>
