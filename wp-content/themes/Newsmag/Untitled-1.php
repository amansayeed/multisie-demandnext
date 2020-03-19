echo '<ul>';
foreach( $company_category as $category ){
    echo '<li><a href="' . esc_url( site_url("companies/name/".$company_name->slug."/company-category/".$category->slug) ) . '">'.$category->name.'</a></li>';
}
echo '</ul>';
