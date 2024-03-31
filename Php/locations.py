import pandas as pd

from ydata_profiling import ProfileReport

dg = pd.read_csv('locations.csv')

print(dg)

profile = ProfileReport(dg)

profile.to_file(output_file="locations.html")