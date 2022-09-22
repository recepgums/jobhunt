<template>
      <div>
          <img
              :src="job?.media[0]"
              class="tw-rounded-xl tw-h-20 tw-w-20"
          />
          <div class="tw-flex tw-space-x-96 tw-pr-6 tw-pb-10">
              <div class="tw-w-full tw-flex tw-flex-row">
                  <div class="">
                      <h1 class="tw-font-bold">
                          {{ job?.category?.name }}
                      </h1>
                      <h1
                          class="tw-font-semibold tw-w-20 md:tw-w-full"
                      >
                          {{ job?.user?.company_name }}
                      </h1>

                      <div class="tw-w-36 tw-pt-4 tw-pr-4">
                          <h1>
                              {{ job?.district?.name }},
                              {{ job?.city?.name }}
                          </h1>
                          <h1>{{ job?.created_at }}</h1>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</template>

<script>

export default {
    props:['job'],
    data() {
        return {

        };
    },
};
</script>
