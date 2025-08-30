<x-layout>
  <section class="bg-light py-5">
        <div class="container">
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-8 text-center">
                        <h2 class="fw-bold mb-3">Frequently Asked Questions</h2>
                        <p class="text-muted fs-6">
                        Here are some of the most common questions our customers ask.  
                        Click on a question to see the answer.
                        </p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="accordion" id="faqAccordion">
                                @foreach ($faqs as $faq)
                                        <div class="accordion-item mb-3 border rounded-4 shadow-sm bg-white">
                                            <h2 class="accordion-header" id="faqHeading{{ $loop->index }}">
                                                <button class="accordion-button fw-semibold rounded-4 {{ $loop->first ? '' : 'collapsed' }}" 
                                                        type="button" 
                                                        data-bs-toggle="collapse" 
                                                        data-bs-target="#faqCollapse{{ $loop->index }}" 
                                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}" 
                                                        aria-controls="faqCollapse{{ $loop->index }}">
                                                    {{ $faq->title }}
                                                </button>
                                            </h2>
                                            <div id="faqCollapse{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" 
                                                aria-labelledby="faqHeading{{ $loop->index }}" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body text-secondary">
                                                {!! $faq->content !!}
                                            </div>
                                            </div>
                                        </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        </div>
  </section>
</x-layout>