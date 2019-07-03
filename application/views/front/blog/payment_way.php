<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>


    <div class="container">
	    <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Payment</a></li>
                    </ol>
                </nav>
            </div>

            <div class="col-lg-9">
                <h1>Cara Pembayaran</h1> <hr>
                <div class="row" >
                    <div class="col-lg-12" align="left" >
                        <p><b>Layanan pembayaran dengan melakukan transfer dana ke rekening virtual melalui jaringan ATM Bersama/Prima/Alto.</b> </p>
                        <p>
                            <ol>
                                <li>Pilih pembayaran melalui Bank Transfer/Virtual Account.</li>
                                <li>Catat 16 digit nomor virtual account & nominal pembayaran Anda.</li>
                                <li>Gunakan ATM yang memiliki jaringan ATM Bersama/Prima/Alto untuk menyelesaikan pembayaran.</li>
                                <li>Masukkan PIN Anda.</li>
                                <li>Di menu utama pilih ‘Others’.</li>
                                <li>Pilih ‘Transfer’ lalu pilih ‘other bank account’.</li>
                                <li>Masukkan kode bank permata ‘013’ diikuti dengan 16 digit nomor virtual account.</li>
                                <li>Masukkan nominal pembayaran lalu pilih ‘Correct’.</li>
                                <li>Pastikan nominal pembayaran & nomor virtual account sudah benar terisi, lalu pilih ‘Correct’.</li>
                                <li>Pembayaran Anda dengan Virtual Account selesai.</li>
                            </ol>
                        </p>
                    </div>                
                </div>
            </div>

        </div>
    </div>




<!-- <?php $this->load->view('front/sidebar'); ?> -->

<?php $this->load->view('front/footer'); ?>