<template>
    <span style="direction:ltr !important" class="block">{{ field.value }}</span>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>
