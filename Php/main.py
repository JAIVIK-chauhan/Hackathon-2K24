import pandas as pd

from ydata_profiling import ProfileReport

df = pd.read_csv('crime.csv')
dg = pd.read_csv('locations.csv')

print(df)

profile = ProfileReport(df)

profile.to_file(output_file="overview.html")