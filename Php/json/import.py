import json
import matplotlib.pyplot as plt

# Load JSON data
with open("crime-data.json") as f:
    data = json.load(f)

# Add the additional data for 2021
data['data'].append({
    "data_year": 2021,
    "Aggravated Assault": 1565,
    "All Other Offenses (Except Traffic)": 18938,
    "Arson": 36,
    "Burglary": 643,
    "Curfew and Loitering Law Violations": 144,
    "Disorderly Conduct": 1509,
    "Driving Under the Influence": 7457,
    "Drug Abuse Violations - Grand Total": 10808,
    "Drunkenness": 0,
    "Embezzlement": 35,
    "Forgery and Counterfeiting": 80,
    "Fraud": 401,
    "Gambling - Total": 0,
    "Human Trafficking - Commercial Sex Acts": 0,
    "Human Trafficking - Involuntary Servitude": 0,
    "Larceny - Theft": 2252,
    "Liquor Laws": 1041,
    "Manslaughter by Negligence": 5,
    "Motor Vehicle Theft": 191,
    "Murder and Nonnegligent Manslaughter": 31,
    "Offenses Against the Family and Children": 525,
    "Prostitution and Commercialized Vice": 15,
    "Rape": 146,
    "Robbery": 67,
    "Simple Assault": 3749,
    "Stolen Property: Buying, Receiving, Possessing": 181,
    "Suspicion": 0,
    "Vagrancy": 5,
    "Vandalism": 797,
    "Weapons: Carrying, Possessing, Etc.": 354,
    "Sex Offenses (Except Rape, and Prostitution and Commercialized Vice)": 218
})

# Extracting keys and data
years = [entry['data_year'] for entry in data['data']]
offenses = data['keys']
offense_data = {offense: [entry[offense] for entry in data['data']] for offense in offenses}

# Plotting
plt.figure(figsize=(14, 8))
for offense in offenses:
    plt.bar(years, offense_data[offense], label=offense)

plt.title('Arrests by Offense Over Years')
plt.xlabel('Year')
plt.ylabel('Number of Arrests')
plt.legend(loc='upper right', fontsize='x-small', bbox_to_anchor=(1.05, 1))
plt.xticks(years, rotation=45)
plt.tight_layout()
plt.grid(True)
plt.show()
