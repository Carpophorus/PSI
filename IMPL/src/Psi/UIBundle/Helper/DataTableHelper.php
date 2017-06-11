<?php
// Viktor Galindo - 655/2013
namespace Psi\UIBundle\Helper;

use Symfony\Component\Templating\Helper\Helper;

class DataTableHelper extends Helper
{

    /**
     * Returns the canonical name of this helper.
     *
     * @return string The canonical name
     */
    public function getName()
    {
        return 'datatable';
    }
    
    protected $templating;
    
    public function __construct($templating) {
        $this->templating = $templating;
    }

    public function renderTable($heading, $data, $cssId, $cssClass, $actions)
    {
        return $this->templating->render("PsiUIBundle:component:datatable.html.php", [
                'heading' => $heading,
                'id' => $cssId,
                'class' => $cssClass,
                'data' => $data,
                'actions' => $actions
        ]);
    }

    public function renderFilters($filters)
    {
        return $this->templating->render("PsiUIBundle:component:filters.html.php", [
                'filterData' => $filters
        ]);
    }

    public function renderPager($currentPage, $pageNumber)
    {
        return $this->templating->render("PsiUIBundle:component:pager.html.php", [
                'currentPage' => $currentPage,
                'pageNumber' => $pageNumber
        ]);
    }
}
