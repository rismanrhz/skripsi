import sqlite3
import random
import math

# Koneksi ke database
def connect_db(db_name):
    conn = sqlite3.connect(db_name)
    return conn

# Ambil data dari database makanan
def fetch_food_data(conn):
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM makanan")
    food_data = cursor.fetchall()
    return food_data

# Ambil data dari database restaurant
def fetch_restaurant_data(conn):
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM restaurant")
    restaurant_data = cursor.fetchall()
    return restaurant_data

# Gabungkan data makanan dan restaurant berdasarkan id_resto
def merge_data(food_data, restaurant_data):
    merged_data = []
    restaurant_dict = {resto[0]: resto for resto in restaurant_data}
    for food in food_data:
        resto = restaurant_dict.get(food[1])
        if resto:
            merged_data.append((*food, resto[1], resto[2]))
    return merged_data

# Inisialisasi populasi
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

# Hitung nilai fitness
def fitness(individual, budget, target_district):
    total_price = sum(item[3] for item in individual)
    distance = 0 if target_district in [item[5] for item in individual] else 1
    return (budget - total_price) - distance * 100  # Berikan penalti jika kecamatan berbeda

# Seleksi
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

# Mutasi
def mutate(individual, data, mutation_rate=0.1):
    for i in range(len(individual)):
        if random.random() < mutation_rate:
            individual[i] = random.choice(data)
    return individual

# Algoritma genetika
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

# Main program
def main():
    db_restaurant = 'restaurant.db'
    db_food = 'makanan.db'
    budget = float(input("Masukkan budget: "))
    target_district = input("Masukkan kecamatan: ")
    
    conn_restaurant = connect_db(db_restaurant)
    conn_food = connect_db(db_food)
    
    restaurant_data = fetch_restaurant_data(conn_restaurant)
    food_data = fetch_food_data(conn_food)
    
    merged_data = merge_data(food_data, restaurant_data)
    
    recommended_menu = genetic_algorithm(merged_data, budget, target_district)
    
    print("Rekomendasi menu makanan dan minuman:")
    for menu in recommended_menu:
        print(f"{menu[2]} - Rp{menu[3]} - Restoran: {menu[4]} - Kecamatan: {menu[5]}")
    
    conn_restaurant.close()
    conn_food.close()

if __name__ == "__main__":
    main()
