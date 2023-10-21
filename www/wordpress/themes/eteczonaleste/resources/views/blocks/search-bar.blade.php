<section
    class="{{ $block->classes }} bg-secondary-light dark:bg-secondary-dark py-10"
    id="{{ $block->block->anchor ?? '' }}"
>
    <div class="container">
        <div class="flex justify-center items-center flex-col md:flex-row gap-6 md:gap-12">
            <h3 class="text-primary-light dark:text-primary-dark font-bold text-xl text-center">Realize uma pesquisa minuciosa para <br> reunir dados relevantes</h3>
            <form
                class="relative w-full max-w-[400px]"
                role="search"
                method="get"
                action="{{ esc_url(home_url( '/' )) }}"
            >
                <fieldset>
                    <label class="sr-only">Realize sua pesquisa digitando aqui</label>

                    <input
                        class="bg-white-light dark:bg-white-dark text-[#919FAE] text- py-3 pl-14 pr-4 rounded-[40px] w-full focus-visible:outline-primary-light dark:focus-visible:outline-primary-dark"
                        type="search"
                        placeholder="Digite Aqui"
                        value="{{ get_search_query() }}"
                        name="s"
                    />
                </fieldset>

                <button
                    class="absolute left-6 top-0 bottom-0 my-auto"
                    type="submit"
                >
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M15.7567 14.5735L11.8125 10.6129C12.8266 9.44901 13.3823 7.98455 13.3823 6.45999C13.3823 2.89801 10.3806 0 6.69113 0C3.0017 0 0 2.89801 0 6.45999C0 10.022 3.0017 12.92 6.69113 12.92C8.07619 12.92 9.39609 12.5167 10.5246 11.751L14.4988 15.7416C14.6649 15.9082 14.8883 16 15.1278 16C15.3544 16 15.5694 15.9166 15.7326 15.7649C16.0794 15.4428 16.0904 14.9085 15.7567 14.5735ZM6.69113 1.68522C9.4182 1.68522 11.6367 3.82713 11.6367 6.45999C11.6367 9.09286 9.4182 11.2348 6.69113 11.2348C3.96406 11.2348 1.74551 9.09286 1.74551 6.45999C1.74551 3.82713 3.96406 1.68522 6.69113 1.68522Z" fill="#919FAE"/>
                    </svg>

                    <span class="sr-only">Buscar</span>
                </button>
            </form>
        </div>
    </div>
</section>
