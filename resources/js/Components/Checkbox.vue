<script setup lang="ts">
import {computed} from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {type: [Array, Boolean], default: false},
    value: {type: Boolean, default: null},
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>

<template>
    <input
        type="checkbox"
        :value="value"
        v-model="proxyChecked"
        class="text-indigo-600 rounded border-gray-300 shadow-sm focus:ring-indigo-500"
    />
</template>
