// Move up or down in array
export default function move(array, index, delta) {
	console.log('move', array, index, delta)

	var newIndex = index + delta
	if (newIndex < 0 || newIndex == array.length) return //Already at the top or bottom.
	var indexes = [index, newIndex].sort((a, b) => a - b) //Sort the indixes (fixed)
	array.splice(indexes[0], 2, array[indexes[1]], array[indexes[0]]) //Replace from lowest index, two elements, reverting the order
}
