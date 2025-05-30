<!-- Footer Start -->
<div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h4 class="text-primary mb-4">Naša pobočka</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>123 Ulica, Nitra, Slovensko</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>+012 345 67890</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>info@example.com</p>
                <div class="d-flex pt-3">
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="https://youtube.com"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href="https://linkedin.com"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <h4 class="text-primary mb-4">Otváracie hodiny</h4>
                <p class="mb-1">Pondelok - Piatok</p>
                <h6 class="text-light">09:00 - 19:00 </h6>
                <p class="mb-1">Sobota</p>
                <h6 class="text-light">09:00 - 12:00 </h6>
                <p class="mb-1">Nedeľa</p>
                <h6 class="text-light">Zatvorené</h6>
            </div>
            <!-- databaza pre mail na novinky *-->
            <div class="col-lg-4 col-md-6">
                <h4 class="text-primary mb-4">Odber noviniek</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <form action="/cajovna/db/spracovanie_newsletter.php" method="POST"> <!-- bezpecnejsie, neuklada sa v url ani v browser historii -->
                <div class="position-relative w-100">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5 text-white" type="email" placeholder="Váš email" name="newsletterEmail" required>
                    <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">odoslať</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a class="fw-medium" href="#">Your Site Name</a>, All Right Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a class="fw-medium" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="fw-medium" href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/cajovna/lib/wow/wow.min.js"></script>
<script src="/cajovna/lib/easing/easing.min.js"></script>
<script src="/cajovna/lib/waypoints/waypoints.min.js"></script>
<script src="/cajovna/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="/cajovna/js/main.js"></script>
