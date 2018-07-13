$(document).ready(function () {

  /*data-search="true" data-page-number="1" data-page-size="10" data-page-list="1, 5, 10, 20, All" data-search-text="" data-show-columns="false" data-show-toggle="false" data-show-pagination-switch="false" data-click-to-select="false" data-select-item-name="" data-single-select="false" data-toolbar="#toolbar" data-checkbox-header="true" data-maintain-selected="true"*/
  
  $('#table').bootstrapTable({
    icons: {
      paginationSwitchDown: 'glyphicon-collapse-down icon-chevron-down',
      paginationSwitchUp: 'glyphicon-collapse-up icon-chevron-up',
      refresh: 'glyphicon-refresh icon-refresh',
      toggle: 'glyphicon-list-alt icon-list-alt',
      columns: 'glyphicon-th icon-th',
      detailOpen: 'glyphicon-plus icon-plus',
      detailClose: 'glyphicon-minus icon-minus',
    },
    buttonsClass: 'success',
    iconsPrefix: 'fa',
    pagination: true,
    onlyInfoPagination: false,
    escape: false,
    smartDisplay: true,
    searchOnEnterKey: false,
    searchTimeOut: 200,
    trimOnSearch: false,
    // showHeader: true,
    // showFooter: true,
    showRefresh: false,
    paginationPreText: '<span class="btn btn-secondary">Prev</span>',
    paginationNextText: '<span class="btn btn-secondary">Next</span>',
    // searchAlign: 'right',
    // buttonsAlign: 'right',
    // toolbarAlign: 'left',
    paginationVAlign: 'bottom',
    maintainSelected: true,
    // footerStyle: function (value, row, index) {
    //   return {
    //     css: {
    //       "font-weight": "bold",
    //     },
    //   };
    // },
    // customSearch: function (text) {},
    // customSort: function (sortName, sortOrder) {},
    // rowAttributes: function (row, index) {},
    // rowStyle: function (row, index) {
    //   console.log(row, index);
    //   return {
    //     classes: 'text-nowrap text-primary',
    //     css: {
    //       "color": "blue",
    //       "font-size": "50px",
    //     },
    //   };
    // },
    // paginationHAlign: 'right',
    // paginationDetailHAlign: 'right',
    // showPaginationSwitch: true,
    // showToggle: true,
    // showColumns: true,
    // searchText: '',
    // pageSize: 10,
    // pageList: [
    //   1, 5, 10, 20, 'All',
    // ],
  });
});
