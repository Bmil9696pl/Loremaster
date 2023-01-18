<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>REGIONSELECT</title>
</head>
<body>
    <div class = "container">
        <div class = "select-text">
            <p class="stext">Select region:</p>
        </div>
        <div class = "select-container">
            <form style="margin: 0;display: flex;flex-direction: column;justify-content: center;align-items: center;width: 100%;height: 100%;" action="regionselect", method="POST">
                <div class="region-button">
                    <img src="public/img/Runeterra_region.webp">
                    <button type="submit" name="runeterra">Runeterra</button>
                </div>
                <div class="region-button">
                    <img src="public/img/Demacia_LoR_Region.webp">
                    <button type="submit" name="demacia">Demacia</button>
                </div>
                <div class="region-button">
                    <img src="public/img/Noxus_LoR_Region.webp">
                    <button type="submit" name="noxus">Noxus</button>
                </div>
                <div class="region-button">
                    <img src="public/img/Freljord_LoR_Region.webp">
                    <button type="submit" name="freljord">Freljord</button>
                </div>
                <div class="region-button">
                    <img src="public/img/Ionia_LoR_Region.webp">
                    <button type="submit" name="ionia">Ionia</button>
                </div>
                <div class="region-button">
                    <img src="public/img/Piltover_Zaun_LoR_Region.webp">
                    <button type="submit" name="piltzaun">Piltover &amp; Zaun</button>
                </div>
                <div class="region-button">
                    <img src="public/img/Shurima_LoR_Region.webp">
                    <button type="submit" name="shurima">Shurima</button>
                </div>
                <div class="region-button">
                    <img src="public/img/Targon_LoR_Region.webp">
                    <button type="submit" name="targon">Targon</button>
                </div>
                <div class="region-button">
                    <img src="public/img/Shadow_Isles_LoR_Region.webp">
                    <button type="submit" name="shadowisles">Shadow Isles</button>
                </div>
            </form>
        </div>
    </div>
</body>