@if(
    $banner &&
    $banner->is_active &&
    $banner->image_path &&
    !isset($_COOKIE['promo_seen'])
)
<div id="promo-overlay"
     style="position:fixed;top:0;left:0;width:100%;height:100%;
            background:rgba(0,0,0,0.6);display:flex;align-items:center;
            justify-content:center;z-index:99999;">

    <div id="promo-content" style="position:relative;max-width:90%;max-height:90%;">
        <!-- <img src="/storage/banner/banner.jpg"  -->
        <img src="{{ $banner->image_path }}" 
             alt="Promo"
            style="max-width:100%;
                    max-height:90vh;
                    height:auto;
                    border-radius:10px;">
        <!-- Кнопка закрытия -->
        <button id="promo-close"
                style="position:absolute;top:10px;right:10px;padding:10px 15px;
                       background:#fff;border:none;border-radius:5px;
                       cursor:pointer;font-size:16px;">
            X
        </button>
    </div>

</div>
@endif

<script>
document.addEventListener('DOMContentLoaded', () => {
    const overlay = document.getElementById('promo-overlay');
    const content = document.getElementById('promo-content');
    const closeBtn = document.getElementById('promo-close');

    function closeBanner() {
        overlay.remove();

        // document.cookie = "promo_seen=1; max-age=86400; path=/";
        document.cookie = "promo_seen=1; max-age=3600; path=/";

        fetch('/close-banner', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });
    }

    // Клик по кнопке X
    closeBtn.addEventListener('click', closeBanner);

    // Клик вне баннера
    overlay.addEventListener('click', (e) => {
        if (!content.contains(e.target)) {
            closeBanner();
        }
    });

    // Закрытие по Esc
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeBanner();
        }
    });
});
</script>
