# find the max element in an array of size N after K number of additions
#ref: https://www.hackerrank.com/challenges/crush/problem

def arrayManipulation(n, queries):
    intial = []
    for _ in range(1, n+1):
        intial.append(0)
    for query in queries:
        for i in range(qauery[0]-1, query[1]):
            intial[i] += query[2]  
    return max(intial)
    
def optimised(n, queries):
    intial = []
    _max = 0
    x = 0
    
    for _ in range(1, n+1):
        intial.append(0)
        
    for query in queries:
        intial[query[0]] += query[2]
        if query[1]+1 <= len(intial) - 1: intial[query[1]+1] -= query[2]
    
    for i in intial:
        x += i
        _max = max(x, _max)
    return _max
    
    
# Driver code:
# print(arrayManipulation(10, [[1,5,3], [4,8,7], [6,9,1]]))
print(optimised(4, [[2,3,603], [1,1,286], [4,4,882]]))
