<?php
// Associative array with filter values for each category
$filters = [
    'Format' => ['Online', 'Offline'],
    'category' => ['Championship', 'Exhibition', 'Conference', 'Workshop'],
    'specialty' => ['Lashes', 'Nails', 'Cosmetics'],
    'date' => ['December', 'January', 'March'],
    'country' => ['Mexico', 'Russia', 'Spain']
];
?>
<div class="filters-mobile">
    <div class="small-screen-filters">
        <button type="submit" class="view-all-button">VIEW ALL</button>
        <button type="button" class="display-filters-button" id="show-filters-btn">FILTERS</button>
        <button type="button" class="clear-all-button">CLEAR ALL</button>
    </div>
    <div class="filter-container">
        <button type="submit" class="view-all-button">VIEW ALL</button>
        <?php foreach ($filters as $category => $options) : ?>
            <div class="filter-group">
                <div class="custom-dropdown-wrapper">
                    <div class="custom-dropdown">
                        <button type="button" class="custom-dropdown-button" tabindex="0"><?php echo $category; ?><img src="<?php echo get_template_directory_uri() .
                "/assets/images/svgs/dropdown.svg"; ?>" alt="arrow down" class="dropdown-svg"></button>
                        <div class="custom-dropdown-content">
                            <?php foreach ($options as $option) : ?>
                                <label class="dropdown-label" tabindex="0">
                                    <input type="checkbox" name="filter-<?php echo strtolower($category); ?>[]" value="<?php echo strtolower($option); ?>"> <?php echo $option; ?>
                                </label>
                            <?php endforeach; ?>
                            <div class="dropdown-buttons">
                                <button type="button" class="dropdown-done-button">Done</button>
                                <button type="button" class="dropdown-clear-button">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <button type="button" class="clear-all-button">CLEAR ALL</button>
    </div>
</div>