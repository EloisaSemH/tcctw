<?php
require_once ("db/classes/DAO/usuarioDAO.class.php");
$usuarioDAO = new usuarioDAO();

if ($_SESSION['logado'] != 2 && $_SESSION['logado'] != 3) {
    ?>
    <script type="text/javascript">
        alert("Desculpe. você não tem permissão para acessar o painel. Faça login ou crie uma conta para acessá-lo.");
        document.location.href = "index.php";
    </script>
    <?php
}

?>

<div class="container mt-4">
    <div class="card">
        <div class="card-body text-justify">
            Nois é foda, o resto é moda!
            <a href="index.php?&pg=logout"><img src="imgs/sair.png" alt="sair" class="float-right "></a>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-justify">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis odio nec risus consectetur molestie a nec mi. Nullam non malesuada dui. Donec eget purus fringilla dolor ultricies venenatis sit amet id lacus. Morbi mollis nisi dolor, ac cursus augue efficitur a. Suspendisse molestie nulla erat, a condimentum nisi mollis in. Donec condimentum porttitor imperdiet. In vel orci et neque porttitor consectetur at et dolor. Fusce non maximus diam, non tristique arcu. Vestibulum porta consequat mauris eget maximus. Ut accumsan erat sed faucibus tempor. Suspendisse iaculis at libero ac mollis. Mauris libero tortor, imperdiet a imperdiet eu, elementum vel nulla. Vestibulum tincidunt ullamcorper convallis. Aliquam mollis finibus ligula ut efficitur. Vivamus interdum, nunc ut consequat pretium, augue lacus tincidunt ipsum, et hendrerit mi quam in nisl.
            Sed maximus elit vel odio facilisis sagittis. Pellentesque porttitor vehicula odio, eget vulputate magna vulputate in. Etiam eget mollis risus, a dictum lacus. Sed dictum sapien nec nibh aliquam tincidunt. Suspendisse tristique, ex id sollicitudin ultrices, lorem enim pellentesque justo, eget aliquet felis nisl nec lacus. Suspendisse volutpat leo non mauris pharetra malesuada. Phasellus ornare eleifend mi, eget consequat purus mollis placerat.
            Fusce malesuada condimentum diam, et sodales augue ullamcorper ac. Fusce sit amet tellus nulla. Aliquam erat volutpat. Aliquam porta nisl ac augue fringilla, at porta sapien posuere. Nullam at dignissim odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque nec eleifend leo, eleifend hendrerit est. Sed eget ante at lectus interdum fringilla. Aenean vestibulum egestas lacus, sed mattis elit imperdiet at.
            Vivamus rhoncus molestie ipsum at placerat. Pellentesque commodo dolor leo, in tristique purus tincidunt quis. Donec nec diam ut turpis auctor ultricies sed ut orci. In pretium ut turpis ut laoreet. Nunc rutrum facilisis varius. Phasellus commodo, neque dictum convallis varius, augue enim laoreet justo, non rhoncus nisl justo eleifend purus. Proin in odio pharetra, tincidunt neque vitae, porta erat. Proin pretium nulla sem, sed mattis velit fermentum quis. Nunc eget gravida elit, non egestas nulla.
            Integer mi mauris, dictum nec gravida a, volutpat sit amet tortor. Nulla facilisi. Nulla eu nulla quam. Donec lobortis mollis nibh in commodo. Nunc interdum vulputate lacus nec facilisis. Sed odio velit, porttitor eu ex vel, lacinia efficitur mi. Nam pellentesque elementum erat, quis tristique metus fermentum ut. Sed eget nibh non enim consequat blandit. Sed dictum vel ex semper convallis. Vivamus efficitur cursus mollis. Curabitur laoreet dolor risus, nec faucibus ipsum iaculis vehicula. In scelerisque metus id ultricies vulputate. Sed a velit eleifend, pulvinar enim eu, ultricies metus. Nam imperdiet vel neque id semper. Mauris tincidunt ultricies congue.
        </div>
    </div>
</div>