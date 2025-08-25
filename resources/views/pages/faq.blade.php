<x-layout>
  <section class="bg-light py-5">
    <div class="container">
        <!-- Title -->
        <div class="row justify-content-center mb-4">
        <div class="col-lg-8 text-center">
            <h2 class="fw-bold mb-3">Frequently Asked Questions</h2>
            <p class="text-muted fs-6">
            Here are some of the most common questions our customers ask.  
            Click on a question to see the answer.
            </p>
        </div>
        </div>

        <!-- Accordion -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="faqAccordion">

                <!-- Question 1 -->
                <div class="accordion-item mb-3 border rounded-4 shadow-sm bg-white">
                    <h2 class="accordion-header" id="faqHeadingOne">
                    <button class="accordion-button fw-semibold rounded-4" type="button" 
                            data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" 
                            aria-expanded="true" aria-controls="faqCollapseOne">
                        How can I create an account?
                    </button>
                    </h2>
                    <div id="faqCollapseOne" class="accordion-collapse collapse show" 
                        aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-secondary">
                        Simply click on the <strong>Register</strong> button at the top of the page, 
                        fill in your details, and you’ll have your account ready in minutes.
                    </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="accordion-item mb-3 border rounded-4 shadow-sm bg-white">
                    <h2 class="accordion-header" id="faqHeadingTwo">
                    <button class="accordion-button collapsed fw-semibold rounded-4" type="button" 
                            data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" 
                            aria-expanded="false" aria-controls="faqCollapseTwo">
                        What payment methods do you accept?
                    </button>
                    </h2>
                    <div id="faqCollapseTwo" class="accordion-collapse collapse" 
                        aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-secondary">
                        We accept all major credit/debit cards, PayPal, and secure online banking options. 
                        All transactions are encrypted for your safety.
                    </div>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="accordion-item mb-3 border rounded-4 shadow-sm bg-white">
                    <h2 class="accordion-header" id="faqHeadingThree">
                    <button class="accordion-button collapsed fw-semibold rounded-4" type="button" 
                            data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" 
                            aria-expanded="false" aria-controls="faqCollapseThree">
                        How long will delivery take?
                    </button>
                    </h2>
                    <div id="faqCollapseThree" class="accordion-collapse collapse" 
                        aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-secondary">
                        Orders are usually processed within 24 hours and shipped within 2-5 business days. 
                        International delivery times may vary depending on your location.
                    </div>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="accordion-item mb-3 border rounded-4 shadow-sm bg-white">
                    <h2 class="accordion-header" id="faqHeadingFour">
                    <button class="accordion-button collapsed fw-semibold rounded-4" type="button" 
                            data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" 
                            aria-expanded="false" aria-controls="faqCollapseFour">
                        Can I return or exchange a product?
                    </button>
                    </h2>
                    <div id="faqCollapseFour" class="accordion-collapse collapse" 
                        aria-labelledby="faqHeadingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-secondary">
                        Yes, we offer a <strong>3-day hassle-free return policy</strong>.  
                        If you’re not satisfied with your order, simply contact our support team for assistance.
                    </div>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="accordion-item mb-3 border rounded-4 shadow-sm bg-white">
                    <h2 class="accordion-header" id="faqHeadingFive">
                    <button class="accordion-button collapsed fw-semibold rounded-4" type="button" 
                            data-bs-toggle="collapse" data-bs-target="#faqCollapseFive" 
                            aria-expanded="false" aria-controls="faqCollapseFive">
                        Is my personal information safe?
                    </button>
                    </h2>
                    <div id="faqCollapseFive" class="accordion-collapse collapse" 
                        aria-labelledby="faqHeadingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-secondary">
                        Absolutely! All your data is protected with end-to-end encryption and 
                        verified by industry-leading security protocols.
                    </div>
                    </div>
                </div>

                </div>
            </div>
            </div>
        </div>
  </section>
</x-layout>