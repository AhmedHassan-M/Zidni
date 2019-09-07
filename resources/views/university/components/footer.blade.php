    {{-- START Footer --}}


    <footer>

            <div class="footer-container">
    
                <div class="footer-top">
    
                    <div class="footer-more-one">
    
                        <h4 class="footer-more-one-title">MORE</h4>
    
                        <div class="footer-more-one-links">
    
    
                            <ul>
                                <li><a href="/mission-vision">Mission, Vision</a></li>
                                <li><a href="/how-to-learn">How to learn</a></li>
                                <li><a href="/agreement">Agreement</a></li>
                                <li><a href="/board-of-advisor">Board of advisor</a></li>
                                <li><a href="/instructor">Instructors</a></li>
                            </ul>
    
                        </div>
    
                    </div>
    
                    <div class="footer-more-two">
    
                        <div class="footer-more-two-links">
    
    
                            <ul>
                                <li><a href="/about-us">About us</a></li>
                                <li><a href="/polices">Polices</a></li>
                                <li><a href="/faq">FAQ</a></li>
                            </ul>
    
                        </div>
    
                    </div>
    
    
    
    
                    <div class="footer-support">
    
                        <h4 class="footer-support-title">SUPPORT</h4>
    
    
                        <div class="footer-support-links">
    
    
                            <ul>
                                <li><a href="/contact-us">Contact Us</a></li>
                                <li><a href="/help">Help</a></li>
                            </ul>
    
                        </div>
    
                    </div>
    
    
    
    
                    <div class="footer-follow">
    
                        <h4 class="footer-follow-title">FOLLOW US</h4>
    
    
                        <div class="footer-follow-links">
    
    
                            <ul>
                                <li>
    
                                    <i class="fab fa-facebook-f"></i>
    
                                </li>
                                <li>
    
                                    <i class="fab fa-twitter"></i>
    
                                </li>
                                <li>
    
                                    <i class="fab fa-linkedin-in"></i>
    
                                </li>
                            </ul>
    
                        </div>
    
                    </div>
    
    
                    <div class="footer-subscribe">
    
                        <h4 class="footer-subscribe-title">SUBSCRIBE NOW</h4>
    
    
                        <div class="footer-subscribe-links">
    
    
                            <form id="subscribeForm">
    
                                <div class="subscribe-input-container">
                                    {{ csrf_field()}}
                                    <input type="email" class="form-control" id="subscribeInput" placeholder="E-Mail"
                                        name="subscribeInput" required>
    
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn subscribe-send">
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </span>
    
                                </div>
    
                            </form>
    
                        </div>
    
                    </div>
    
    
                </div>
    
                <span class="footer-devider"></span>
    
                <div class="footer-bottom">
    
    
                    <div class="footer-bottom-logo">
    
    
                        <img src="{{asset('images/zidni-logo-1.png')}}" alt="Zidni logo">
    
    
                    </div>
    
    
                    <div class="footer-bottom-about">
    
                        <h5>ABOUT US</h5>
    
                        <p>Zidni Islamic Institute is a non-profit organization that teaches the Islamic Sciences according
                            to the methodology
                            of orthodox Sunni Islam, Ahl al-Sunnah Wa al-Jamāʿah.</p>
    
    
                    </div>
    
    
                </div>
    
                <div class="copyright">
    
                    <p>© 2019 Zidni Islamic Institute. All rights reserved. Developed By <a class="wasilaDev"
                            href="http://wasiladev.com/" target="_blank">WasilaDev</a></p>
    
    
                </div>
    
    
            </div>
    
    
        </footer>
    
    
    
        <div class="development-mode-container">
    
            <span>development mode V2.01</span>
            <br />
            <span>Zidni university V0.01</span>
    
        </div>
    
    
    
        <a id="scroll"><span></span></a>
    
        {{-- END Footer --}}
    
    
        <script type="text/javascript" src="{{asset('js/vendor.js')}}"></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.24.1/sweetalert2.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.js">
        </script>
        <script src="https://player.vimeo.com/api/player.js"></script>
        <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
        <script type="text/javascript" src="{{asset('js/main-app.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/main-university.js')}}"></script>
    
        <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        </script>