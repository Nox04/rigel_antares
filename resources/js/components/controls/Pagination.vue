<template>
  <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded">
    <div class="kt-datatable__pager kt-datatable--paging-loaded">
      <ul class="kt-datatable__pager-nav">
        <li>
          <a
            :class="['kt-datatable__pager-link kt-datatable__pager-link--first', {'kt-datatable__pager-link--disabled': isOnFirstPage}]"
            href=""
            @click.prevent="loadPage(1)"
          >
            <i class="flaticon2-fast-back" />
          </a>
        </li>
        <li>
          <a
            :class="['kt-datatable__pager-link kt-datatable__pager-link--first', {'kt-datatable__pager-link--disabled': isOnFirstPage}]"
            href=""
            @click.prevent="loadPage('prev')"
          >
            <i class="flaticon2-back" />
          </a>
        </li>

        <template v-if="notEnoughPages">
          <li
            v-for="n in totalPage"
            :key="n"
          >
            <a
              :class="['kt-datatable__pager-link kt-datatable__pager-link-number', {'kt-datatable__pager-link--active': isCurrentPage(n)}]"
              @click.prevent="loadPage(n)"
              v-html="n"
            />
          </li>
        </template>
        <template v-else>
          <li
            v-for="n in windowSize"
            :key="n"
          >
            <a
              :class="['kt-datatable__pager-link kt-datatable__pager-link-number',{'kt-datatable__pager-link--active': isCurrentPage(windowStart+n-1)}]"
              @click.prevent="loadPage(windowStart+n-1)"
              v-html="windowStart+n-1"
            />
          </li>
        </template>

        <li>
          <a
            :class="['kt-datatable__pager-link kt-datatable__pager-link--first', {'kt-datatable__pager-link--disabled': isOnLastPage}]"
            href=""
            @click.prevent="loadPage('next')"
          >
            <i class="flaticon2-next" />
          </a>
        </li>
        <li>
          <a
            :class="['kt-datatable__pager-link kt-datatable__pager-link--first', {'kt-datatable__pager-link--disabled': isOnLastPage}]"
            href=""
            @click.prevent="loadPage(totalPage)"
          >
            <i class="flaticon2-fast-next" />
          </a>
        </li>
      </ul>
      <div class="kt-datatable__pager-info">
        <span class="kt-datatable__pager-detail">{{ paginationInfo }}</span>
      </div>
    </div>
  </div>
</template>

<script>
import VuetablePaginationMixin from 'vuetable-2/src/components/VuetablePaginationMixin';
import VuetablePaginationInfoMixin from 'vuetable-2/src/components/VuetablePaginationInfoMixin';

export default {
  mixins: [VuetablePaginationMixin, VuetablePaginationInfoMixin]
}
</script>
