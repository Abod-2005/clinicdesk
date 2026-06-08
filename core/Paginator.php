<?php
class Paginator {
    private $totalItems; //عدد العناصر الكلي
    private $perPage;   //عدد العناصر في الصفحة
    private $currentPage;  //الصفحة الحالية

    public function __construct($totalItems, $perPage, $currentPage = 1) {
        $this->totalItems = $totalItems;
        $this->perPage = $perPage;
        $this->currentPage = max(1, $currentPage); //تأكد أن الصفحة الحالية لا تقل عن 1
    }
    public function offset() {
        return ($this->currentPage - 1) * $this->perPage;
    }
// دالة لحساب إجمالي عدد الصفحات
    public function totalPages() {
        return ceil($this->totalItems / $this->perPage);
    }
// دوال للتحقق من وجود صفحات سابقة أو تالية
    public function hasPrev() {
        return $this->currentPage > 1;
    }
// دالة للتحقق من وجود صفحة تالية
    public function hasNext() {
        return $this->currentPage < $this->totalPages();
    }
// دوال للحصول على أرقام الصفحات السابقة والتالية
    public function currentPage() {
        return $this->currentPage;
    }
// دالة للحصول على رقم الصفحة السابقة
    public function getPrevPage() {
        return $this->currentPage - 1;
    }
// دالة للحصول على رقم الصفحة التالية
    public function getNextPage() {
        return $this->currentPage + 1;
    }
}