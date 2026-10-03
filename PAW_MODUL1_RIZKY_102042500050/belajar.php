<?php 

$produk = [
    [
        "nama" => "Logitech G512 X 98 DUAL SWAP",
        "kategori" => "Aksesoris",
        "harga" => 3449000,
        "stok" => 8,
        "gambar" => "Logitech G512 X 98 DUAL SWAP.avif"
    ],
    [
        "nama" => "VortexSeries IGNIX Series R1 V2 Mouse",
        "kategori" => "Aksesoris",
        "harga" => 344000,
        "stok" => 5,
        "gambar" => "VortexSeries IGNIX Series R1 V2 Mouse.png"
    ],
    [
        "nama" => "Laptop ASUS ROG PRO DUO GX651AX-I9N59OL9G-HM",
        "kategori" => "Laptop",
        "harga" => 128799000,
        "stok" => 0,
        "gambar" => "Laptop ASUS ROG PRO DUO GX651AX-I9N59OL9G-HM.jpg"
    ],
    [
        "nama" => "SIMGOT EW300 Standard",
        "kategori" => "Audio",
        "harga" => 1574000,
        "stok" => 2,
        "gambar" => "SIMGOT EW300 Standard.webp"
    ],
    [
        "nama" => "SAMSUNG ODYSSEY GAMING MONITOR 27 INCH",
        "kategori" => "Monitor",
        "harga" => 4910000,
        "stok" => 5,
        "gambar" => "SAMSUNG ODYSSEY GAMING MONITOR 27 INCH.webp"
    ],
    [
        "nama" => "MSI GeForce RTX 5090 GAMING",
        "kategori" => "VGA",
        "harga" => 129625000,
        "stok" => 1,
        "gambar" => "MSI GeForce RTX 5090 GAMING.jpg"
    ],
];

function rupiah($harga)
{
    return "Rp " . number_format($harga, 0, ',', '.');
}

$jumlahProduk = count($produk);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cia Store</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="navbar">
        <div class="container nav-content">

            <div class="logo">
                Cia Store
            </div>

            <nav> 
                <a href="#home">Home</a>
                <a href="#produk">Produk</a>
                <a href="#tentang">Tentang</a>
            </nav>

        </div>
    </header>

    <section class="hero" id="home">
        <div class="container"> 
            <p class="label">CIA STORE </p>

            <h1> 
                Perangkat Teknologi
                Untuk Kebutuhanmu
            </h1>

            <p class="hero-text"> 
                Temukan berbagai perangkat dan aksesoris
                teknologi dengan harga terjangkau
            </p>

            <a href="#produk" class="hero-button">
                Lihat Produk
            </a>

        </div>

    </section>

    <section class="produk-section" id="produk"> 

        <div class ="container"> 

            <div class ="produk-header"> 

                <div> 

                    <p class="small-title">
                        KATALOG PRODUK
                    </p>

                    <h2> 
                        Produk Cia Store
                    </h2>

                </div>

                <div class="jumlah-produk"> 
                    <strong> 
                        <?php echo $jumlahProduk; ?>
                    </strong>

                    <span> 
                        Produk
                    </span>
                </div>

            </div>

            <div class="produk-grid"> 

                <?php foreach ($produk as $item): ?>

                    <?php 
                        if ($item["harga"] >= 1000000) {
                            $diskon = 10;
                            $jumlahDiskon = $item["harga"] * $diskon / 100;
                            $hargaSetelahDiskon = $item["harga"] - $jumlahDiskon;
                        } else {
                            $diskon = 0;
                            $hargaSetelahDiskon = $item["harga"];
                        }

                        if ($item["stok"] > 0) {
                            $status = "Tersedia";
                            $statusClass = "tersedia";
                        } else {
                            $status = "Stok Habis";
                            $statusClass = "habis";
                        }
                    
                    ?>

                    <div class="card">

                        <div class="card-image">
                            <img src="<?php echo $item["gambar"]; ?>" 
                            alt="<?php echo $item["nama"]; ?>">
                        </div>

                        <div class="card-content">

                            <span class="kategori">
                                <?php echo $item["kategori"]; ?>
                            </span>

                            <h3>
                                <?php echo $item["nama"]; ?>
                            </h3>

                        <?php if ($diskon > 0): ?>

                            <p class="harga-normal">
                                <?php echo rupiah($item["harga"]); ?>
                            </p>

                            <p class="diskon">
                                Diskon <?php echo $diskon; ?>%
                            </p>

                            <p class="harga">
                                <?php echo rupiah($hargaSetelahDiskon); ?>
                            </p>
                            <?php else: ?>
                            <p class="harga">
                                <?php echo rupiah($item["harga"]); ?>
                            </p>
                        <?php endif; ?>

                            <div class="stok">

                                <span>
                                    Stok: <?php echo $item["stok"]; ?>
                                </span>

                                <span class="status <?php echo $statusClass; ?>">
                                    <?php echo $status; ?>
                                </span>

                            </div>


                            <?php if ($item["stok"] > 0): ?>

                                <button class="btn-beli">
                                    Beli Sekarang
                                </button>

                            <?php else: ?>

                                <button class="btn-beli disabled" disabled>
                                    Stok Habis
                                </button>

                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <footer id="tentang">

        <div class="container footer-content">

            <div>
                <h3>CiaStore</h3>

                <p>
                    Toko perangkat dan aksesoris teknologi.
                </p>
            </div>

            <p>
                &copy; <?php echo date("Y"); ?> Cia Store
            </p>

        </div>

    </footer>

</body>
</html>