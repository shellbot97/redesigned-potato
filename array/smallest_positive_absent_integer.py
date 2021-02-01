# Find the smallest positive integer that does not occur in a given sequence
# reference: https://stackoverflow.com/questions/51719848/find-the-smallest-positive-integer-that-does-not-occur-in-a-given-sequence

def solution(a):
    for i in range(0, len(a)):
        for j in range(i+1, len(a)):
            if(a[i] > a[j]):
                temp = a[i]
                a[i] = a[j]
                a[j] = temp

    for i in range(0,len(a)):
        if (i+1) < len(a):
            if((a[i]+1 != a[i+1]) and (a[i] != a[i+1])):
                return a[i]+1
        else:
            if(a[-1] > 0):
                return a[-1]+1
            else:
                return 1

def optimised(a):
	m = max(a)
	if(m <= 0):
		return 1
		
	A = set(a)
	B = set(range(1, m+1))
	C = B-A
	if(len(C) == 0):
	    return m+1
	else:
	    return min(C)

print(solution([1, 3, 6, 4, 1, 2])) # expected: 5
print(optimised([1, 3, 6, 4, 1, 2])) # expected: 5
print(solution([1,2,3])) # expected: 4
print(optimised([1,2,3])) # expected: 4
print(solution([-1,-2])) # expected: 1
print(optimised([-1,-2])) # expected: 1
