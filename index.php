<?php

declare(strict_types=1);

/**
 * Nature's Prime - single-page website (English / Traditional Chinese).
 *
 *   index.php            -> English
 *   index.php?lang=zh    -> Traditional Chinese
 *
 * Requires PHP 8.1+, built and tested for PHP 8.5.
 * Text lives in includes/lang/*.php, contact details and brands in includes/config.php,
 * styles in assets/css/style.css.
 */

$config = require __DIR__ . '/includes/init.php';

$lang = Lang::fromQuery($_GET['lang'] ?? null);
$switchTo = $lang->other();
$t = translations($lang);

header('Content-Type: text/html; charset=UTF-8');
header('Content-Language: ' . $lang->htmlLang());
?>
<!DOCTYPE html>
<html lang="<?= e($lang->htmlLang()) ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($t['title']) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">
</head>

<body>

    <header class="header">
        <div class="container-fluid mt-3">
            <div class="row align-items-center">
                <div class="col-4 col-md-2">
                    <img src="<?= e(asset($t['mobile_logo'])) ?>" alt="<?= e($config['site_name']) ?>" class="header__logo logoHide">
                </div>
                <div class="col-8 col-md-8 text-center">
                    <div class="header__logo-container">
                        <img src="<?= e(asset('NP_logo.png')) ?>" alt="<?= e($config['site_name']) ?>" class="header__logo centerLogoHide">
                    </div>
                </div>
                <div class="col-md-2 text-right d-md-block language_translater">
                    <a href="?lang=<?= e($switchTo->value) ?>" lang="<?= e($switchTo->htmlLang()) ?>" hreflang="<?= e($switchTo->htmlLang()) ?>"><?= e($t['switch_label']) ?></a>
                </div>
            </div>
        </div>
    </header>

    <!-- Banner -->
    <div class="ban_sec">
        <div class="ban_img">
            <img src="<?= e(asset('banner.png')) ?>" alt="banner">
            <div class="ban_text">
                <strong><?= lines($t['banner_lines']) ?></strong>
            </div>
        </div>
    </div>

    <!-- About us -->
    <div class="container mb-5" id="aboutUs">
        <div class="row align-items-center">
            <div class="col-md-6 d-flex justify-content-center">
                <img src="<?= e(asset('image_about.png')) ?>" alt="about us" class="img-fluid contentImages">
            </div>
            <div class="col-md-6 order-sm-first order-last mt15">
                <h2 class="heading"><?= e($t['about_heading']) ?></h2>
                <p class="mt-4"><?= e($t['about_text']) ?></p>
            </div>
        </div>
    </div>

    <!-- Promise -->
    <div class="background-images pt-5 pb-5">
        <div class="container pt-5 pb-5">
            <div class="row align-items-center">
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="<?= e(asset('image_promise.png')) ?>" alt="promise" class="img-fluid contentImages">
                </div>
                <div class="col-md-6 mt15">
                    <h2 class="heading"><?= e($t['promise_heading']) ?></h2>
<?php foreach ($t['promise_paragraphs'] as $paragraph): ?>
                    <p class="mt-4"><?= e($paragraph) ?></p>
<?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Manufacturer -->
    <div class="container pt-5 pb-5" id="manufacturer">
        <div class="row p10">
            <h2 class="heading"><?= e($t['brands_heading']) ?></h2>
        </div>
        <div class="row mt-3 p10">
            <p><?= e($t['brands_text']) ?></p>
        </div>
<?php foreach ($config['brands'] as $row => $brands): ?>
        <div class="<?= $row === 0 ? 'mt-3' : 'mt-5' ?> mb-3">
            <div class="image-container">
<?php foreach ($brands as $brand): ?>
                <img src="<?= e(asset('brand_logos/' . $brand['file'])) ?>" alt="<?= e($brand['name']) ?>">
<?php endforeach; ?>
            </div>
        </div>
<?php endforeach; ?>
    </div>

    <!-- Footer / Contact us -->
    <footer class="footerBg" id="contactUs">
        <div class="container mt-5 pb-5">
            <div class="flex-container pt-5">
                <div class="flex-item">
                    <img src="<?= e(asset('NP_logo_footer.png')) ?>" alt="<?= e($config['site_name']) ?>" width="120">
                </div>
                <div class="flex-item">
                    <h6><?= e($t['address_heading']) ?></h6>
                    <p class="mt-3 white-fonts"><?= lines($t['address_lines']) ?></p>
                </div>
                <div class="flex-item">
                    <h6><?= e($t['hours_heading']) ?></h6>
                    <p class="mt-3 white-fonts"><?= lines($t['hours_lines']) ?></p>
                </div>
                <div class="flex-item">
                    <h6><?= e($t['contact_heading']) ?></h6>
                    <p class="mt-3 white-fonts">
                        <a href="<?= e(tel_href($config['phone'])) ?>" class="white-fonts font-weight-bold"><?= e($config['phone']) ?></a><br>
                        <a href="mailto:<?= e($config['email']) ?>" class="white-fonts"><?= e($config['email']) ?></a>
                    </p>
                </div>
            </div>
            <p class="text-center white-fonts pt-5 copyright">
                Copyright ©<?= e(date('Y')) ?> <?= e($t['copyright']) ?>
            </p>
        </div>
    </footer>

</body>

</html>
