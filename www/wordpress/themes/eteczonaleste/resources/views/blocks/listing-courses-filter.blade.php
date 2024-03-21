<section
  class="{{ $block->classes }} listing-courses-filter bg-white-light dark:bg-white-dark py-6"
  id="{{ $block->block->anchor ?? '' }}"
  data-js="listing-courses-filter"
>
    <div class="container">
        <div class="courses-listing__wysiwyg">
            {!! $content['wysiwygContent'] !!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-[230px_1fr] gap-10 mt-14">
            <aside class="relative">
                <ul class="bg-secondary dark:bg-secondary-dark rounded-lg p-8 pl-14 flex flex-col gap-3 sticky top-14">
                    <li class="listing-courses-filter__checkbox" role="checkbox" data-filter="">
                        <button class="flex items-center gap-3 relative dark:text-white-light before:absolute before:top-0 before:bottom-0 before:my-auto before:-left-8 before:w-4 before:h-4 before:rounded before:bg-[#D9D9D9]">
                            Todos
                        </button>
                    </li>

                    @foreach($content['filters'] as $filter)
                        <li class="listing-courses-filter__checkbox" role="checkbox" data-filter="{{$filter->term_id}}">
                            <button class="flex items-center gap-3 relative before:absolute before:top-0 before:transition-all dark:text-white-light before:duration-300 before:bottom-0 before:my-auto before:-left-8 before:w-4 before:h-4 before:rounded before:bg-[#D9D9D9]">
                                {{ $filter->name }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </aside>

            <div class="relative">
                <x-loading-spinner class="!absolute !bg-white dark:!bg-white-dark !pt-16 !items-start" />

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-8 max-w-[1036px] mx-auto" data-container="cards">
                    @php
                        if($advance['allCourses']) {
                            $query = new WP_Query([
                                'post_type' => 'cursos',
                                'posts_per_page' => -1,
                                'post_status' => 'publish',
                            ]);
                            $content['repeaterPosts'] = [$query->posts];
                        }
                    @endphp

                    @foreach($content['repeaterPosts'] as $posts)
                        @include('partials.list-courses')
                    @endforeach
                </div>

                <div class="flex justify-center mt-14">
                    @notempty($content['button'])
                        <x-button
                            :button="$content['button']"
                        />
                    @endnotempty
                </div>
            </div>
        </div>
    </div>
</section>
