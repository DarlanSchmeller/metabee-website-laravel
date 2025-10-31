@props([
    "course" => null,
    "reviews" => null,
    "existingreview" => null,
])
<section class="relative pt-12 overflow-hidden" id="review-section">
    <div class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8">
        @auth
            <x-review-form :course="$course" :reviewed="$existingReview" />
        @endauth

        {{-- Divider --}}
        <div class="flex items-center my-8">
            <div class="flex-1 h-px bg-gray-700/50"></div>
            <span class="px-4 text-gray-400 text-sm font-medium">Avaliações</span>
            <div class="flex-1 h-px bg-gray-700/50"></div>
        </div>

        {{-- List Reviews --}}
        <div class="space-y-6 mt-12">
            @forelse ($reviews as $review)
                <div class="flex gap-4 p-4 bg-gray-800/50 rounded-xl border border-amber-500/20 shadow-sm">
                    {{-- Avatar --}}
                    <div
                        class="w-10 h-10 rounded-full bg-amber-500/20 border border-amber-500/40 flex items-center justify-center overflow-hidden"
                    >
                        @if (! empty($review->user->user_image) && file_exists(storage_path("app/public/" . $review->user->user_image)))
                            <img
                                src="{{ asset("storage/" . $review->user->user_image) }}"
                                alt="{{ $review->user->name }}"
                                class="w-full h-full object-cover"
                            />
                        @else
                            <x-heroicon-o-user class="w-6 h-6 text-amber-400" />
                        @endif
                    </div>

                    {{-- Review Content --}}
                    <div class="flex-1">
                        <div class="flex flex-col gap-2 md:flex-row md:gap-4 md:items-center md:justify-between">
                            <div class="flex flex-wrap items-center gap-4">
                                <h4 class="font-semibold text-white">
                                    {{ $review->user->name }}
                                </h4>
                                <div class="flex items-center gap-1 text-gray-400 text-xs">
                                    <x-heroicon-o-calendar class="w-4 h-4" />
                                    <span>{{ $review->created_at->format("d/m/Y") }}</span>
                                </div>
                            </div>

                            <div class="flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    <x-heroicon-s-star
                                        class="w-5 h-5 {{ $i <= $review->rating ? 'text-amber-400' : 'text-gray-600' }}"
                                    />
                                @endfor
                            </div>
                        </div>

                        <p class="mt-2 text-gray-300 text-sm">{{ $review->content }}</p>
                    </div>
                </div>
            @empty
                <div class="flex flex-col items-center gap-4 pb-6 font-semibold text-gray-400">
                    <x-heroicon-o-pencil class="w-6 h-6" />
                    <p class="text-sm">Este curso ainda não possui nenhuma avaliação</p>
                </div>
            @endforelse

            {{-- Pagination --}}
            <div
                class="mt-10"
                x-data
                x-init="
                    $el.querySelectorAll('a').forEach((link) => {
                        link.addEventListener('click', (e) => {
                            e.preventDefault()
                            const url = new URL(link.href)
                            url.hash = 'review-section'
                            window.location.href = url.toString()
                        })
                    })
                "
            >
                {{ $reviews->links("vendor.pagination.tailwind") }}
            </div>
        </div>
    </div>
</section>
