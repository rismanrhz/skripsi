import sqlite3
import random
import json
import os 

# Database connection
def connect_db(db_name):
    conn = sqlite3.connect(db_name)
    return conn

# Fetch food data
def fetch_food_data(conn):
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM makanan")
    return cursor.fetchall()

# Fetch restaurant data
def fetch_restaurant_data(conn):
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM restaurant")
    return cursor.fetchall()

# Merge data
def merge_data(food_data, restaurant_data):
    merged_data = []
    restaurant_dict = {resto[0]: resto for resto in restaurant_data}
    for food in food_data:
        resto = restaurant_dict.get(food[1])
        if resto:
            merged_data.append((*food, resto[1], resto[2]))
    return merged_data

# Initialize population
def initialize_population(data, budget, population_size):
    population = []
    for _ in range(population_size):
        individual = []
        total_price = 0
        while total_price < budget:
            menu = random.choice(data)
            if total_price + menu[3] <= budget:
                individual.append(menu)
                total_price += menu[3]
        population.append(individual)
    return population

# Fitness function
def fitness(individual, budget, target_district):
    total_price = sum(item[3] for item in individual)
    distance = 0 if target_district in [item[5] for item in individual] else 1
    return (budget - total_price) - distance * 100  # Penalty for different district

# Selection
def selection(population, budget, target_district):
    fitness_values = [(fitness(ind, budget, target_district), ind) for ind in population]
    fitness_values.sort(reverse=True)
    return [ind for _, ind in fitness_values[:len(population)//2]]

# Crossover
def crossover(parent1, parent2):
    crossover_point = random.randint(0, min(len(parent1), len(parent2)) - 1)
    child1 = parent1[:crossover_point] + parent2[crossover_point:]
    child2 = parent2[:crossover_point] + parent1[crossover_point:]
    return child1, child2

# Mutation
def mutate(individual, data, mutation_rate=0.1):
    for i in range(len(individual)):
        if random.random() < mutation_rate:
            individual[i] = random.choice(data)
    return individual

# Genetic algorithm
def genetic_algorithm(data, budget, target_district, population_size=100, generations=100):
    population = initialize_population(data, budget, population_size)
    for _ in range(generations):
        selected_population = selection(population, budget, target_district)
        next_generation = []
        while len(next_generation) < population_size:
            parent1, parent2 = random.sample(selected_population, 2)
            child1, child2 = crossover(parent1, parent2)
            next_generation.append(mutate(child1, data))
            next_generation.append(mutate(child2, data))
        population = next_generation
    best_individual = max(population, key=lambda ind: fitness(ind, budget, target_district))
    return best_individual

# Main function
def main():
    db_path = 'C:/laragon/www/skripsi/database/skripsi.db'  # Ganti dengan path file DB Anda
    if not os.path.exists(db_path):
        print(f"File database tidak ditemukan: {db_path}")
        return

    print(f"File database ditemukan: {db_path}")

    budget = float(input("Masukkan budget: "))
    target_district = input("Masukkan kecamatan: ")

    conn = connect_db(db_path)
    
    restaurant_data = fetch_restaurant_data(conn)
    food_data = fetch_food_data(conn)
    
    merged_data = merge_data(food_data, restaurant_data)
    
    recommended_menu = genetic_algorithm(merged_data, budget, target_district)
    
    recommendations = [{
        "nama_menu": menu[2],
        "harga": menu[3],
        "restaurant": menu[4],
        "kecamatan": menu[5]
    } for menu in recommended_menu]
    
    print(json.dumps(recommendations))  # Output recommendations as JSON
    
    conn.close()

if __name__ == "__main__":
    main()
