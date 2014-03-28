import sys, os

if len(sys.argv) < 2:
	sys.exit("Please insert file name")

filename = sys.argv[1]
if not os.path.exists(filename):
	sys.exit("Error: File '%s' could not be found" % sys.argv[1])
	
f = open(filename, 'r')
theList1 = [line.strip() for line in f if line.strip()]
fline = theList1[0]
sline = theList1[1]
tline = theList1[2]
theList1.remove(fline)
theList1.remove(sline)
theList1.remove(tline)
players = []
for n in theList1:
	if n.startswith('='):
		x = 3
	else:
		firstname, lastname, batted, numBats, times, withh, numHits, hits, andd, numRuns, runs = n.split()
		name = firstname + " " + lastname
		if players.count(name) == 0:
			players.append(name)

f2 = open(filename, 'r')
theList2 = [line.strip() for line in f2 if line.strip()]
fline2 = theList2[0]
sline2 = theList2[1]
tline2 = theList2[2]
theList2.remove(fline2)
theList2.remove(sline2)
theList2.remove(tline2)
average = 0
averagearray = {}
for i in players:
	batarray = []
	hitarray = []
	for j in theList2:
		if j.startswith('='):
			x = 4
		else:
			firstname2, lastname2, batted, numBats2, times, withh, numHits2, hits, andd, numRuns, runs = j.split()			
			
			name2 = firstname2 + " " + lastname2
			if name2 == i:
				batarray.append(int(numBats2))
				hitarray.append(int(numHits2))
			sumBats = sum(batarray)
			sumHits = sum(hitarray)
			if sumBats == 0:
				average = 0
			else:
				average =float(sumHits)/float(sumBats)
	averagearray[i]="%.3f"%average	
for key, value in reversed(sorted(averagearray.iteritems(), key=lambda (k,v): (v,k))):
    print "%s: %s" % (key, value)



















