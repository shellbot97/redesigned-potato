# find elements of subarray of an array whose sum is the maximum
# reference: https://medium.com/@rsinghal757/kadanes-algorithm-dynamic-programming-how-and-why-does-it-work-3fd8849ed73d


# brute force approach
def solution(arr):
    _max = sum(arr)
    for k in range(2, len(arr)):
        for i in range(0, len(arr[:0-(k-1)])):
            _sum = 0
            for j in range(i, i+k):
                _sum += arr[j]
            if _sum > _max:
                _max = _sum
                arr_range = range(i, i+k)
    return arr_range


# driver code
arr = [-2, 1, -3, 4, -1, 2, 1, -5, 4]
_range = solution(arr)
for i in _range:
    print(arr[i])
