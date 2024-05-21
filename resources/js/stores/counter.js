import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useCounterStore = defineStore('counter', () => {
	// States
	const count = ref(0)
	// Getters
	const doubleCount = computed(() => count.value * 2)
	// Actions
	function increment() {
		count.value++
	}
	// Export
	return { count, doubleCount, increment }
})
