<?php
$infos_link_topbar = get_field('infos_link_topbar', 'option');
$localisation_link_topbar = get_field('localisation_link_topbar', 'option');
$localisation_text_topbar = get_field('localisation_text_topbar', 'option');
$phone = get_field('phone', 'option');
?>
<div class="cvs-top-bar alignwide">
  <div class="flex">
    <a href="<?php $localisation_link_topbar; ?>" title="<?php echo $localisation_text_topbar ?>">
      <?php echo $localisation_text_topbar ?>
    </a>
    <span class="relative px-2 py-0 m-0 -top-0.5 text-tertiary">|</span>
    <a class="flex" href="<?php echo $infos_link_topbar ?? '#'; ?>">
      <svg xmlns=" http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 14 14">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M7.5.5a1.75 1.75 0 0 1 0 3.5h-7m11.25 6.5a1.75 1.75 0 0 0 0-3.5H2m5.25 6.5a1.75 1.75 0 0 0 0-3.5H1.5" />
      </svg>
      <span id="cvs-wind" class="px-2 font-semibold"></span>
    </a>
  </div>
  <div>
    <a class="flex items-center" href="tel:330<?php echo str_replace(' ', '', $phone); ?>" title="<?php _e('contact phone'); ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
        <path fill="currentColor" d="M19.95 21q-3.225 0-6.287-1.438t-5.425-3.8q-2.363-2.362-3.8-5.425T3 4.05q0-.45.3-.75t.75-.3H8.1q.35 0 .625.225t.325.575l.65 3.5q.05.35-.013.638T9.4 8.45L7 10.9q1.05 1.8 2.625 3.375T13.1 17l2.35-2.35q.225-.225.588-.337t.712-.063l3.45.7q.35.075.575.338T21 15.9v4.05q0 .45-.3.75t-.75.3Z" />
      </svg><span class="hidden ml-1 lg:inline">+33 (0)<?php echo $phone; ?></span>
    </a>
  </div>
</div>