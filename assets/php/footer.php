<footer class="bg-dark-brown text-white pt-5 pb-3 shadow">
        <div class="container">
            <div class="row">
                <?php
                    $file = fopen('assets/csv/footer.csv', 'r');
                    
                    while(($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $number = $data[0];
                        $address = $data[1];

                        $access1 = $data[2];
                        $access2 = $data[3];
                        $access3 = $data[4];
                        $access4 = $data[5];
                        $access5 = $data[6];
                        $access6 = $data[7];

                        $photo1 = $data[8];
                        $photo2 = $data[9];
                        $photo3 = $data[10];
                        $photo4 = $data[11];
                        $photo5 = $data[12];
                        $photo6 = $data[13];

                    
                        footerCol3($number, $address);
                        footerCol3_2($access1, $access2, $access3, $access4, $access5, $access6);
                        footerGallery($photo1, $photo2, $photo3, $photo4, $photo5, $photo6);

                    }
                    fclose($file);
                ?>
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold text-lime mb-4">Clinic Schedule</h5>
                    <div class="bg-light-brown p-3 rounded">
                        <p class="mb-1">Mon - Sat: <span class="fw-bold">8:00 AM - 7:00 PM</span></p>
                        <p class="mb-1">Sun - Holidays: <span class="fw-bold">BY APPOINTMENT</span></p>
                    </div>
                </div>
            </div>
            <div class="text-center pt-3 border-top border-secondary mt-3">
                <p class="mb-0">&copy; 2024 Nose to Tail Veterinary CLinic and Grooming Center <br>by Ramil Yacat. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    

<script src="assets/js/script.js"></script>
</body> 
</html>