{{-- Mini Orbit System Component --}}
@props(['items' => []])

<div class="mini-orbit" x-data="miniOrbit()">
  <div class="mini-orbit__container">

    {{-- Center Core --}}
    <div class="mini-orbit__core">
      <div class="mini-orbit__logo">
        <i class="fas fa-star"></i>
      </div>
    </div>

    {{-- Orbiting Items --}}
    <div class="mini-orbit__ring">
      @foreach($items as $index => $item)
        <div class="mini-orbit__item" data-index="{{ $index }}">
          <div class="mini-orbit__badge">
            @if(isset($item['icon']))
              <i class="{{ $item['icon'] }}"></i>
            @endif
            <span>{{ $item['label'] ?? 'Item ' . ($index + 1) }}</span>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</div>

@once
@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('miniOrbit', () => ({
    init() {
      this.positionItems()
      window.addEventListener('resize', () => this.positionItems())
    },

    positionItems() {
      const items = this.$el.querySelectorAll('.mini-orbit__item')
      const itemCount = items.length

      items.forEach((item, index) => {
        const angle = (360 / itemCount) * index
        const rad = (angle - 90) * (Math.PI / 180)
        const radius = 80 // Distance from center in pixels

        const x = Math.cos(rad) * radius
        const y = Math.sin(rad) * radius

        item.style.transform = `translate(${x}px, ${y}px)`
      })
    }
  }))
})
</script>
@endpush
@endonce
