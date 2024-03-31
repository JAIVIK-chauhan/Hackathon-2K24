import pandas as pd

from ydata_profiling import ProfileReport

dg = pd.read_csv('crime.csv')

print(dg)

profile = ProfileReport(dg)

profile.to_file(output_file="crime.html")