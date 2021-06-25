<?php

if (isset($_GET["search"])) {
    $query = "SELECT * FROM services WHERE name LIKE '%{$_GET["search"]}%'";
} else {
    $query = "SELECT * FROM services";
}

$services_data = mysqli_query($con, $query);
$services = mysqli_fetch_all($services_data, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ЭкзоТипограф</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php require_once "parts/header.php"; ?>
    <main class="container-fluid bg-light">
        <div class="container py-3">
            <div class="row justify-content-center pb-3">
                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == 2) : ?>
                <h4 class="py-1 text-secondary">Включён режим администратора.</h4>
                <?php endif; ?>
            </div>
            <div class="row justify-content-center pb-3">
                <div class="col">
                    <form>
                        <label for="search">Поиск услуг</label>
                        <div class="form-row justify-content-start">
                            <div class="col">
                                <input type="text" class="form-control mb-2" id="search" name="search"
                                    placeholder="Введите название услуги...">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-success mb-2">Найти</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == 2) : ?>
            <div class="row justify-content-center pb-1">
                <div class="col-auto">
                    <a href="add.php" class="btn btn-success my-1">Добавить услугу</a>
                </div>
            </div>
            <?php endif; ?>
            <div class="row justify-content-center">
                <?php if (count($services) > 0) :
                    foreach ($services as $service) : ?>
                <div class="col-auto mx-3">
                    <div class="card my-3 shadow-sm" style="width: 18rem;">
                        <img src="<?= $service["image_path"]; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $service["name"]; ?> </h5>
                            <p class="card-text"><?= $service["short_description"]; ?></p>
                            <a href="service.php?id=<?= $service["id"]; ?>" class="btn btn-success my-1">Подробнее</a>
                            <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == 2) : ?>
                            <a href="edit.php?id=<?= $service["id"] ?>" class="btn btn-primary my-1">Редактировать</a>
                            <a href="scripts/delete.php?id=<?= $service["id"]; ?>"
                                class="btn btn-danger my-1">Удалить</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach;
                else : ?>
                <p class="py-1">Услуги с таким названием не найдены.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <?php require_once "parts/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>
