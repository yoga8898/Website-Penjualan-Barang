DROP DATABASE IF EXISTS `mp_2022_barang`;
CREATE DATABASE IF NOT EXISTS `mp_2022_barang` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `mp_2022_barang`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nama` varchar(150) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `harga` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `nama`, `keterangan`, `gambar`, `harga`) VALUES
(1, 'Chilschool Soya Vanilla 300g', 'Susu pendamping ASI untuk anak usia 3-12 tahun yang alergi susu sapi, dengan kandungan Isolat Protein Kedelai yang berkualitas tinggi setara susu sapi (penambahan L-Metionin dan Karnitin, dengan formula MoriCare+ Prodiges∑ (Triple Bifidus) yaitu : faktor Kecerdasan Multitalenta sehingga bayi tumbuh cerdas dan faktor Pertahanan Tubuh Ganda untuk mengurangi timbulnya gejala alergi pada kulit, saluran pernafasan, dan pencernaan, serta agar bayi tidak mudah sakit seperti demam, batuk, pilek, diare, dan sembelit dan faktor Tumbuh Kembang Optimal.\r\n\r\nMaltodekstrin, Isolat Protein Kedelai (17,38%), Minyak Nabati (Mengandung Antioksidan Askorbil Palmitat dan Tokoferol), Sukrosa, FOS, Pengemulsi Nabati, Perisa Sintetik, Kolin, AA (Mengandung Antioksidan Natrium Askorbat, Tokoferol, dan Askorbil Palmitat), DHA (Mengandung Antioksidan Natrium Askorbat, Campuran Tokoferol, dan Askorbil Palmitat), Inositol, Taurin, Nukleotida, L-Karnitin, Bifidobacterium longum BB536, Bifidobacterium longum subsp. infantis M-63, Bifidobacterium breve M-16V, Premiks Mineral dan Premiks Vitamin.\r\n\r\n\"Susu pendamping ASI untuk anak usia 3-12 tahun yang alergi susu sapi, dengan kandungan Isolat Protein Kedelai berkualitas tinggi setara susu sapi (penambahan L-Metionin dan Karnitin), dengan formula MoriCare+ Prodiges∑ (Triple Bifidus) yaitu : \r\n1. Faktor Kecerdasan Multitalenta\r\n2. Faktor Pertahanan Tubuh Ganda\r\n3. Faktor Tumbuh Kembang Optimal\"', 'gambar/1.PNG', 68640),
(2, 'Romano Shampoo Pria Anti-Dandruff Force 170Ml', 'Diformulasikan khusus untuk pria, ROMANO Force Anti Dandruff Shampoo bantu lindungi kulit kepala dari ketombe dengan parfum maskulin khas ROMANO Force.\r\n\r\nFormula ZPT dan Icy Menthol-nya bantu cegah ketombe dengan sensasi dingin maksimal yang menyegarkan kulit kepala dan rambutmu. Wangi citrus dan jejak woody, tinggalkan wangi maskulin unik yang lebih tahan lama pada rambutmu. \r\n\r\nCara Pakai: Busakan ke seluruh tubuh. Bilas hingga bersih.\r\n\r\nShelf life 3 years\r\nBPOM 18170602680', 'gambar/2.PNG', 21200),
(3, 'Aiken Instan Hand Sanitiser 200 Ml', 'Aiken Instant Hand Sanitiser, efektif memberikan perlindungan instan terhadap kuman di tangan hingga 99.9% dengan kandungan alcohol 70%, melembabkan, tidak lengket di tangan & cepat kering. \r\n\r\nKEMENKES RI PKD 20501020175 \r\n\r\nShelf Life: 3 Years', 'gambar/3.PNG', 17000),
(4, 'EPSON TINTA 003 ORIGINAL untuk Printer L1110 L3100 L3101 L3110 L3150 L5190 - series', 'EPSON TINTA 003 ORIGINAL \r\nTersedia : BLACK - CYAN - MAGENTA - YELLOW\r\nHarga adalah Harga per botol.\r\nVolume : 65ml per botol\r\n\r\norder harus di etalase yg sesuai. \r\norder diproses bukan berdasarkan keterangan warna di catatan untuk penjual / komentar pembeli\r\n\r\nUntuk printer Epson L1110 L3100 L3110 L3150 L5190\r\nBarang original\r\nGunakan selalu tinta original utk hasil print lebih baik dan printer awet. \r\n\r\nCatatan wajib dibaca. Order = Setuju\r\nBarang yang nilainya lebih dari 10x ongkos kirim (atau pembelian kuantiti), gunakan ASURANSI untuk proteksi resiko kerusakan / kehilangan barang dalam pengiriman.\r\nKerusakkan atau kehilangan saat pengiriman adalaha tanggungjawab kurir, bukan penjual.\r\nMasukkan alamat pengiriman yg jelas untuk mempermudah kurir dalam pengiriman\r\nBila alamat tidak jelas dan barang kembali ke penjual, maka ongkis kirim akan hangus	\r\nBarang yang sudah dibeli tidak dapat ditukar /  dikembalikan.', 'gambar/4.PNG', 75000),
(5, 'Scarlett Whitening Facial Wash', 'Notes : Setiap pembelian produk Scarlett minimal 5 item akan mendapatkan Box Exclusive yang dikirimkan secara random, sesuai persediaan yang masih ada. \r\n\r\nScarlett Whitening Facial Wash 100ml\r\n\r\nFacial Wash mengandung Glutathione, Vitamin E, Rose Petals, dan Aloe Vera yang sangat bagus untuk :\r\n1. mencerahkan kulit wajah.\r\n2. menutrisi kulit wajah.\r\n3. mengontrol kadar minyak berlebih diwajah.\r\n4. mengecilkan pori-pori diwajah. \r\n5. sangat bagus untuk meregenerasi kulit wajah agar tampak lebih kencang. \r\n6. membantu menghilangkan beruntus/jerawat. \r\n\r\nKandungan aloevera yang menyejukan juga dapat melembabkan kulit wajah, jadi kulit akan terasa lebih lembut.', 'gambar/5.PNG', 64900),
(6, 'Carmed Lotion (putih) 100ml', 'Body lotion yang khusus untuk memperbaiki kulit kering/sangat kering, kusam dan pecah - pecah, terutama untuk area kulit yang sangat membutuhkan kelembaban extra, terutama di area lengan, siku, lutut, dan tumit. Sangat cocok untuk kulit kering dan sensitif\r\n Dengan kombinasi formula (moisturizing agent combination) pelembab kulit alami ini bersifat keratolik yaitu mampu mengangkat kulit mati pada bagian kulit tubuh dan membantu kelembaban kulit secara alami. Tekstur lotion yang ringan dan tidak lengket (non greasy) mampu memperbaiki kulit kering, pecah - pecah dan kusam tidak hanya di bagian permukaan kulit saja.\r\n\r\nGunakan secara teratur setiap hari untuk mendapatkan kulit yang lebih halus dan lembab secara alami. Gunakan setelah mandi, mencuci tangan maupun ketika lama di dalam ruangan dengan kelembaban kering (AC)\r\n', 'gambar/6.PNG', 27800),
(7, 'Jam Tangan Pria Sporty Impor VAVA VOOM VA-215', 'DESKRIPSI PRODUK:\r\n\r\nJam tangan tidak nyala dari awal karena dimatiin dari pabrik supaya tidak boros batere. CARA AKTIFKAN jam tangan: Lepaskan cincin tarik plastik putih, sesuaikan waktu setempat, lalu tekan tombol. Arloji mulai berjalan\r\nMemiliki model sporty dan elegan, cocok untuk bisnis dan kasual\r\nProduk termasuk kotak jam yang bagus\r\nMemiliki fungsi auto-date\r\nDial ukuran besar\r\nChronograph sebagai aksesoris\r\n\r\nSPISIFIKASI/FITUR:\r\n\r\nNama Merek: VAVA VOOM ORIGINAL\r\nModel: VA-215\r\nKetebalan: 14.5mm\r\nDiameter: 48mm\r\nLebar wrist strap:22mm\r\nPanjang wrist strap: 245mm\r\nBerat:76 gram\r\nMovement: Japan Quartz Movt.\r\nBahan body jam: Alloy\r\nTahan air biasa. TIDAK untuk berenang / mandi, dan hindari cuara kedingingan, hujan deras, air panas dan uap panas.\r\n\r\njam tangan pria, jam tangan pria original, jam tangan pria murah, jam tangan pria anti air, jam tangan pria analog', 'gambar/7.PNG', 79900);

-- --------------------------------------------------------

--
-- Table structure for table `tb_beli`
--

CREATE TABLE `tb_beli` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `barang` smallint(5) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(10) UNSIGNED DEFAULT NULL,
  `bayar` int(10) UNSIGNED DEFAULT NULL,
  `waktu` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `email` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_beli`
--
ALTER TABLE `tb_beli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_beli_barang` (`barang`),
  ADD KEY `fk_beli_user` (`email`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_beli`
--
ALTER TABLE `tb_beli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_beli`
--
ALTER TABLE `tb_beli`
  ADD CONSTRAINT `fk_beli_barang` FOREIGN KEY (`barang`) REFERENCES `tb_barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_beli_user` FOREIGN KEY (`email`) REFERENCES `tb_user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
