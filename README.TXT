Fatin Theme Base for SLiMS
Version 3.15.2-0.1 RC3 build 18381101102011

Copyright (c) 1432 H / 2011 M
Indra Sutriadi Pipii (indra@sutriadi.web.id)

Official Website: http://sutriadi.web.id/fatin
Daily Development: https://github.com/sutriadi/fatin

# Persyaratan System
- SLiMS 3 Stable 15 "Matoa" (download di http://slims.web.id/)
- Modul Plugins SLiMS 3.15-2.1 "Nantu" (download di
  http://sutriadi.web.id/)

# Instalasi
- ekstrak paket fatin-3.15.2-x.x sehingga akan menghasilkan
  direktori ./fatin
- salin direktori fatin hasil ekstraksi ke ./template/
- login ke administrasi SLiMS, masuk menu System
- pada pengaturan Public Template, pilih: Fatin
- simpan pengaturan, kemudian muat ulang halaman OPAC

# Membuat Block
- masuk menu Plugins
- masuk submodul Block
- klik Add Block
- masukkan ID/nama, judul, serta isi block
- bila perlu tambahkan class serta tentukan jenis block text/html/php
- simpan block

# Menampilkan Block
- masuk menu Plugins
- masuk submodul Block
- pilih block yang akan diaktifkan, pilih Region serta Index Layout
- simpan konfigurasi

CHANGELOG
01.10.2011
Kandidat Rilis 3
- penyesuaian halaman login petugas perpustakaan, visitor member
- penambahan class CSS list, untuk block
- pemisahan class CSS block untuk tema dasar dari tema Poyowa
- penggunaan jQuery-UI untuk popup fileviewer
- penambahan fitur tampil/sembunyi: logo, title, subtitle
